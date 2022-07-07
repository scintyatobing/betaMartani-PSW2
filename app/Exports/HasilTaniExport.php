<?php

namespace App\Exports;

use App\Models\HasilTani;
use Maatwebsite\Excel\Concerns\FromCollection;

class HasilTaniExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return HasilTani::all();
    }
}
