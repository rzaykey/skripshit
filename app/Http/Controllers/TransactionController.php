<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction; 
use App\Customer;
use App\Http\Controllers\SMTPController;
class TransactionController extends Controller
{
    
    function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->middleware('auth');
    }
    public function index()
    {
        return view('transaction.needconfirm', ['data' => $this->transaction->where('status','PAID')->paginate(10)]);
    }
    public function confirm($id)
    {
        if($id === null)
        {
            return redirect()->back()->with(['error' => 'Gagal']);
        }
        
        $transaction = Transaction::find($id);
        $transaction->status = "CONFIRMED";
        $transaction->updated_at = now();
        if($transaction->save())
        {
            SMTPController::send($transaction->id_customer, "transaction.confirm");
            return redirect()->back()->with(['success' => 'Produk untuk '. Customer::find($transaction->id_customer)->name. ' Berhasil di konfirmasi']);
        }
    }
    public function cancel($id)
    {
        if($id === null)
        {
            return redirect()->back()->with(['error' => 'Gagal']);
        }
        $transaction = Transaction::find($id);
        $transaction->status = "CANCEL";
        $transaction->updated_at = now();
        if($transaction->save())
        {
            SMTPController::send($transaction->id_customer, "transaction.cancel");

            return redirect()->back()->with(['success' => 'Produk untuk '. Customer::find($transaction->id_customer)->name. ' Berhasil di batalkan']);
        }
    }
    public function cancels()
    {
        return view('transaction.cancel', ['data' => $this->transaction->where('status','CANCEL')->paginate(10)]);
    }
    public function waiting()
    {
        return view('transaction.send', ['data' => $this->transaction->where('status','CONFIRMED')->paginate(10)]);
    }
    public function waitings($id)
    {
        if($id === null)
        {
            return redirect()->back()->with(['error' => 'Gagal']);
        }
        $transaction = Transaction::find($id);
        $transaction->status = "SUCCESS";
        $transaction->updated_at = now();
        if($transaction->save())
        {
            SMTPController::send($id, "transaction.sent");
            return redirect()->back()->with(['success' => 'Produk untuk '. Customer::find($transaction->id_customer)->name. ' Berhasil di kirim']);
        }
    }
    public function return()
    {
        return view('transaction.return', ['data' => $this->transaction->where('status','RETURN')->paginate(10)]);
    }
    public function success()
    {
        return view('transaction.success', ['data' => $this->transaction->where('status','SUCCESS')->paginate(10)]);
    }
}
