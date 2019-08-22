<?php

namespace App\Exports;

use App\Models\Kebaya;
use Maatwebsite\Excel\Concerns\FromCollection;

class KebayaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kebaya::all();
    }

    public function model(array $row)
    {
        return new Kebaya([
            'name'     => $row[0],
            'image'    => $row[1],
        ]);
    }
}
