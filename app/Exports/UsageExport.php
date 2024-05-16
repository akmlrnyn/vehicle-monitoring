<?php

namespace App\Exports;

use App\Models\Permission;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UsageExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.monthly-usage', [
            'permissions' => Permission::all()
        ]);
    }
}
