<?php

namespace App\Imports;

use App\Models\Visitor;
use Maatwebsite\Excel\Concerns\ToModel;

class VisitorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Visitor([
            'name'     => $row[0],
            'email'    => $row[1], 
            'password' => Hash::make($row[2]),
        ]);
    }
}
