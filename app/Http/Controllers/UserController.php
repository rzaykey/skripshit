<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

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
            'password' => ['required', 'string', 'min:5', 'confirmed']
        ]);
            $user = User::create([
                'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'address' => $request['address'],
            'status' => $request['status'],
            'image' => $request['image'],
            ]);
            return redirect(route('user.index'))->with(['success' => 'User Baru Ditambahkan']);
        
    }
    public function destroy($id)
    {
        if($id == '' || $id == null) {
            return redirect()->back()->with(['error' => 'Something went wrong ']);
        }
        $delete = User::deletes($id);
        if($delete)
        {
            echo "<script>alert('Dihapus') </script>";
            echo "<script>window.location.href='/user'</script>";
        }
    }
    public function edit($id)
    {
        return view('user.update');
    }
}
