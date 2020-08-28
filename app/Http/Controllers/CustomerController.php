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
        $district = District::all();
        $customer = Customer::all();
        return view('customers.create', compact('customer','district'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'district_id' => 'nullable|exists:districts,id',
            'password' => 'required|string|min:5|confirmed'
        ]);
                $customer = Customer::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'address' => $request['address'],
                'district_id' => $request['district_id'],
                'status' => $request['status']
            ]);
            return redirect(route('customer.index'))->with(['success' => 'Pelanggan Baru Ditambahkan']);
        
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        $district = District::orderBy('name', 'DESC')->get();
        return view('customer.edit', compact('customer','district'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [    		
            'name' => 'required|string|max:100',
        ]);
        
        $customer = Customer::find($id);
    
    	$customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'district_id' => $request->district_id
    	]);
    	return redirect(route('customer.index'))->with(['success' => 'Customer Diperbaharui!']);
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect(route('customer.index'))->with(['success' => 'Customer Sudah Dihapus']);
    }
}
