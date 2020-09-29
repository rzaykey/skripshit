<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Socialite;

class UserController extends Controller
{
    //
    public function index()
    {
    	$user = User::all();
    	return view('user.index', compact('user'));
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
		$user = User::all()
		->where('name','like',"%".$cari."%")
		->paginate();
		return view('user.index', compact('user'));
 
	}
    public function create()
    {
        $user = User::all();
        return view('user.create', compact('user'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],            
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);
        
        if($request->hasFile('image')) {
            $to = 'users';
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($to, $filename);

            $user = User::create([
                'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'address' => $request['address'],
            'status' => $request['status'],
            'image' => $filename
            ]);
            return redirect(route('user.index'))->with(['success' => 'User Baru Ditambahkan']);
        }
        
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [    		
            'name' => 'required|string|max:100',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);
        
        $user = User::find($id);
        $filename = $user->image;
        if($request->hasFile('image')) {
            $to = 'users';
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($to, $filename);
            File::delete(storage_path('app/public/users/' . $user->image));
        }
    	$user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'image' => $filename
    	]);
    	return redirect(route('user.index'))->with(['success' => 'User Diperbaharui!']);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('user.index'))->with(['success' => 'User Sudah Dihapus']);
    }

    
}
