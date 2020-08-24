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
            'province_id' => 'required|exists:provinces,id'
        ]);
            $city = City::create([
                'name' => $request->name,
                'province_id' => $request->province_id,
                'type' => $request->type,
                'postal_code' => $request->postal_code
            ]);
            return redirect(route('city.index'))->with(['success' => 'Kota Baru Ditambahkan']);
        }
        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name' => 'required|string|max:50|unique:categories,name,' . $id
            ]);
            $city = City::find($id);
            $city->update([
                'name' => $request->name,
                'province_id' => $request->province_id,
                'type' => $request->type,
                'postal_code' => $request->postal_code
            ]);
            return redirect(route('city.index'))->with(['success' => 'Kota Diperbaharui!']);
        }
        public function edit($id)
        {
            $city = City::find($id);
            $province = Province::orderBy('name', 'DESC')->get();
            return view('cities.edit', compact('city', 'province'));
        }

        public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect(route('city.index'))->with(['success' => 'Kota Sudah Dihapus']);
    }
}
