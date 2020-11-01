<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class CustomerExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('export.customer', [
            'customers' => Customer::all()
        ]);
    }
}
