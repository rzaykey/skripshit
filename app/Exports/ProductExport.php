<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ProductExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('export.product', [
            'product' => Product::all()
        ]);
    }
}
