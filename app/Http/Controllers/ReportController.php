<?php

namespace App\Http\Controllers;
use App\Models\Visitor;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitor = Visitor::all();
        return view('laporan.index',compact('visitor'));
    }
    public function cetak()
    {
        $visitor = Visitor::all();
        return view('laporan.cetak',compact('visitor'));
    }

    public function cetakFormPertanggal(){
        
        return view('laporan.cetak-pertanggal');
    }

    public function cetakPertanggal($tglawal, $tglakhir){
        // return [$tglawal,$tglakhir];
        // dd("Tanggal Awal". $tglawal, "Tanggal Akhir" . $tglakhir);
        
        $tglpengunjung = Visitor::all()->whereBetween('created_at',[$tglawal,$tglakhir]);
        return view('laporan.cetak-pertanggal-fix', compact('tglpengunjung'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
