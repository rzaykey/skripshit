<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index() 
    {
        return view('ecommerce.dashboard');
    }
}
