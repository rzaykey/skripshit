<?php

namespace App\Exports;

use App\City;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class CityExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('export.city', [
            'city' => City::all()
        ]);
    }
}
