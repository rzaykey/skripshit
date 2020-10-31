<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product; 

class TransactionController extends Controller
{
    
    function __construct(Product $product)
    {
        $this->product = $product;
        $this->middleware('auth');
    }
    public function index()
    {
        return view('transaction.needconfirm', ['data' => $this->product->all()]);
    }
}
