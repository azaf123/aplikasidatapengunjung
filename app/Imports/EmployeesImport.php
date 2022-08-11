<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'nama_karyawan'     => $row[0],
            'no_karyawan'    => $row[1], 
            'fungsi_id' => $row[2],
            'email'    => $row[3], 
        ]);
    }
}
