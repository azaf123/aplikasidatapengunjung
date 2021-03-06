<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Fungsi;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use App\Models\Employee;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.landingpage');
    }
    public function isiBuku()
    {
        $fungsi = Fungsi::all();
        $card = Card::where('status', 'inaktif')->get();
        return view('frontend.isibuku', compact('fungsi', 'card'));
    }

    public function isiBukuform(Request $request)
    {

        // return $request;
        $request->validate(
            [
                'image' => 'required',
                'namavisitor' => 'required|min:3|max:100',
                'alamat' => 'required',
                'fungsiid' => 'required',
                'karyawanid' => 'required',
                'keperluan' => 'required',
                'nokartu' => 'required',
                'status' => 'required',
                'nokontak'=>'required'


            ],
            [
                'namavisitor.required' => 'Nama Pengunjung Diperlukan',
                'namavisitor.min' => 'min 3 kata',
                'namavisitor.max' => 'max 100 kata',
                'alamat.required' => 'Alamat Pengunjung Diperlukan',
                'fungsiid.required' => 'Nama Fungsi Diperlukan',
                'karyawanid.required' => 'Nama Karyawan diperlukan',
                'keperluan.required' => 'Keperluan Diperlukan',
                'image.required'=>'Foto Diperlukan',
                 'nokontak.required'=> 'Nomor Kontak HP diperlukan'

            ]
        );
        $reqfoto = $request->image;
        $foto = substr($reqfoto, strpos($reqfoto, ',') + 1);
        $dekod = base64_decode($foto);
        $file_name = "img- " . time() . rand(11111, 99999) . ".png";
        $folder = public_path('img/');
        $fp = fopen($folder . $file_name, 'w');
        fwrite($fp, $dekod);
        fclose($fp);
        $request->image = $file_name;

        
        $visitor= Visitor::create(
            
            [
                'image' => $file_name,
                'nama_pengunjung' => $request->namavisitor,
                'alamat' => $request->alamat,
                'fungsi_id' => $request->fungsiid,
                'employee_id' => $request->karyawanid,
                'keperluan' => $request->keperluan,
                'card_id' => $request->nokartu,
                'status' => $request->status, 
                'contact'=>$request->nokontak
            ]
        );
        Card::where('id', $request->nokartu)->update([
            'status' => 'aktif'
        ]);
        $namakaryawan = Employee::where('id', $request->karyawanid)->first();
        
// mail
        $details =[
            'title'=>'Tamu Kunjungan',
            'namakaryawan'=>$namakaryawan->nama_karyawan,
            'namavisitor'=>$request->namavisitor,
            'alamat'=>$request->alamat,
            'keperluan'=>$request->keperluan,
            'nokontak'=>$request->nokontak,
            'waktu'=>$visitor->created_at,
            'image'=>$file_name
            
            
        ];
        $email = Employee::where('id', $request->karyawanid)->first();
        Mail::to($email->email)->send(new Email($details));
        // return "Email Sent";
        return redirect('/landingpage');
    }

    public function keluarPengunjungForm()
    {
        $card = Card::where('status', 'aktif')->get();
        return view('frontend.keluar', compact('card'));
    }

    public function keluarPengunjung(Request $request)
    {
        // return $request;
        $visitor = Visitor::where('card_id', $request->nokartu)
            ->where('status', 'datang')->first();
        // return $visitor;

        Visitor::where('id', $visitor->id)->update(
            [
                'status' => 'pulang'
            ]

        );
        Card::Where('id', $request->nokartu)->update([
            'status' => 'inaktif'

        ]);

        return redirect('/landingpage');
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
