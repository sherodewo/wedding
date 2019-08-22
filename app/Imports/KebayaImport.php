<?php

namespace App\Imports;

use App\Models\Kebaya;
use Maatwebsite\Excel\Concerns\ToModel;

class KebayaImport implements ToModel
{
    public function model(array $row)
    {
        return new Kebaya([
            'name'     => $row[0],
            'image'    => $row[1],
        ]);
    }
}