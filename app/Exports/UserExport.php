<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class UserExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('export.user', [
            'users' => User::all()
        ]);
    }
}
