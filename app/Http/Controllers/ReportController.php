<?php

namespace App\Http\Controllers;

use App\Models\Fungsi;
use App\Models\Officer;
use App\Models\Visitor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
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
        $visitor = Visitor::all();
        $fungsi = Fungsi::all();
        return view('laporan.cetak-pertanggal',compact('visitor','fungsi'));
    }

    public function cetakPertanggal($tglawal, $tglakhir,$fungsi){
        // return [$tglawal,$tglakhir];
        // dd("Tanggal Awal". $tglawal, "Tanggal Akhir" . $tglakhir , "fungsi".$fungsi);
        // dd($tglawal,$tglakhir,$fungsi);
        $fungsis = Fungsi::all();
        $tglpengunjung = Visitor::all()->whereBetween('created_at',[$tglawal,$tglakhir])->whereIn('fungsi_id',$fungsi);
        if($tglpengunjung->count() > 0){
            return view('laporan.cetak-pertanggal-fix', compact('tglpengunjung','fungsis'));
        }else{
            Alert::error('Data Tidak Ditemukan','Oops..');
            return redirect()->back();
        }
        
    }
    public function cetakPertanggalWithoutFungsi($tglawal, $tglakhir){
        $tglpengunjung = Visitor::all()->whereBetween('created_at',[$tglawal,$tglakhir]);
        if($tglpengunjung->count() > 0){
            return view('laporan.cetak-pertanggal-fix', compact('tglpengunjung'));
        }else{
            Alert::error('Data Tidak Ditemukan','Oops..');
            return redirect()->back();
        }
    }
    

    public function cetakError(){
        return view('laporan.cetakerror');
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
