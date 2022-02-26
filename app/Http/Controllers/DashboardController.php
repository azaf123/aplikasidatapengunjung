<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Employee;
use App\Models\Fungsi;
use App\Models\Officer;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_pengunjung = Visitor::all()->count();
        $jumlah_dikantor = Visitor::where('status', 'datang')->count();
        $jumlah_karyawan = Employee::all()->count();
        $jumlah_fungsi = Fungsi::all()->count();
        $jumlah_petugas = Officer::all()->count();
        $jumlah_kartu = Card::all()->count();
        return view('dashboard.index')->with('jumlah_pengunjung', $jumlah_pengunjung)->with('jumlah_karyawan', $jumlah_karyawan)->with('jumlah_fungsi', $jumlah_fungsi)->with('jumlah_petugas', $jumlah_petugas)->with('jumlah_dikantor', $jumlah_dikantor)->with('jumlah_kartu', $jumlah_kartu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
