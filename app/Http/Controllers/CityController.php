<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Province;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    //
    public function index()
    {
        $city = City::with(['province'])->orderBy('created_at', 'DESC');
        if (request()->q != '') {
            $city = $city->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $city = $city->paginate(10);
        $province = Province::orderBy('name', 'DESC')->get();
        return view('cities.index', compact('city','province'));
    }

    public function create()
    {
        return view('cities.index', compact('city'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'province_id' => 'required|exists:province,id'
        ]);
            $city = City::create([
                'name' => $request->name,
                'slug' => $request->name,
                'province_id' => $request->province_id,
                'type' => $request->type,
                'postal_code' => $request->postal_code
            ]);
            return redirect(route('city.index'))->with(['success' => 'Kota Baru Ditambahkan']);
        }
     
}
