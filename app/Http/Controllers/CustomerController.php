<?php

namespace App\Http\Controllers;

use App\Customer;
use App\District;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $customer = Customer::all();
        $district = District::orderBy('name', 'DESC')->get();
    	return view('customers.index', compact('customer'));
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
		$customer = Customer::all()
		->where('name','like',"%".$cari."%")
		->paginate();
		return view('customers.index', compact('customer'));
	}
    public function create()
    {
        $customer = Customer::all();
        return view('customers.create', compact('customer'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'district_id' => 'required|exists:districts,id',
            'password' => ['required', 'string', 'min:5', 'confirmed'],            
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);
        
        if($request->hasFile('image')) {
            $to = 'customers';
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($to, $filename);

            $customer = Customer::create([
                'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'address' => $request['address'],
            'district_id' => $request['distric_id'],
            'status' => $request['status'],
            'image' => $filename,
            ]);
            return redirect(route('customer.index'))->with(['success' => 'Pelanggan Baru Ditambahkan']);
        }
        
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        $district = District::orderBy('name', 'DESC')->get();
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [    		
            'name' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);
        
        $customer = Customer::find($id);
        $filename = $customer->image;
        if($request->hasFile('image')) {
            $to = 'customers';
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($to, $filename);
            File::delete(storage_path('app/public/customers/' . $customer->image));
        }
    	$customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'image' => $filename
    	]);
    	return redirect(route('customers.index'))->with(['success' => 'Customer Diperbaharui!']);
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect(route('customers.index'))->with(['success' => 'Customer Sudah Dihapus']);
    }
}
