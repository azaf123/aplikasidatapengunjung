<?php

namespace App\Exports;

use App\Models\Visitor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitorExport implements FromCollection, ShouldAutoSize,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Visitor::all();
    }
    public function map($visitor):array{
        return[
        $visitor->id,
        $visitor->nama_pengunjung,
        $visitor->alamat,
        $visitor->fungsi->nama_fungsi,
        $visitor->employee->nama_karyawan,
        $visitor->keperluan,
        $visitor->contact,
        $visitor->card->no_kartu,
        $visitor->created_at,
        $visitor->updated_at
    ];
    }
    public function headings():array{
        return[
            'No',
            'Nama Pengunjung',
            'Alamat',
            'Nama Fungsi',
            'Nama Karyawan',
            'Keperluan',
            'Nomor Kontak',
            'Nomor Kartu',
            'Waktu Datang',
            'Waktu Keluar'
        ];
    }
}
