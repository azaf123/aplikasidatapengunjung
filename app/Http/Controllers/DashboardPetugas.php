<?php

namespace App\Http\Controllers;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Fungsi;
use App\Models\Officer;
use App\Models\Card;

use Illuminate\Http\Request;

class DashboardPetugas extends Controller
{
    public function laporanVisitor()
    {
        $visitor = Visitor::all();
        return view('dashboardPetugas.laporan',compact('visitor'));
    }
    public function dashboardPetugas(){
        $jumlah_pengunjung = Visitor::all()->count();
        $jumlah_dikantor = Visitor::where('status', 'datang')->count();
        $jumlah_karyawan = Employee::all()->count();
        $jumlah_fungsi = Fungsi::all()->count();
        $jumlah_petugas = Officer::all()->count();
        $jumlah_kartu = Card::all()->count();
        return view('dashboardPetugas.dashboard')->with('jumlah_pengunjung', $jumlah_pengunjung)->with('jumlah_karyawan', $jumlah_karyawan)->with('jumlah_fungsi', $jumlah_fungsi)->with('jumlah_petugas', $jumlah_petugas)->with('jumlah_dikantor', $jumlah_dikantor)->with('jumlah_kartu', $jumlah_kartu);
    }
}
