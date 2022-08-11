<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Fungsi;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use App\Models\Employee;
use Error;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp;

class FrontendController extends Controller
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
        return view('frontend.landingpage');
    }
    public function isiBuku()
    {
        $fungsi = Fungsi::all();
        $visitor = Visitor::all();
        $card = Card::where('status', 'inaktif')->get();
        return view('frontend.isibuku', compact('fungsi', 'card','visitor'));
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
// $path = 'public/images/';
// $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0eXBlIjoiVVNFUiIsImlkIjoxODQsImtleSI6NTM3MzUzNTI5LCJpYXQiOjE2NTI1NDkyNDh9.5n5j20gafq9hYAPGFsx7qOKXpHHXF2Seq6C5fCmOisc";
// $type = 'ktp';
// $url = 'https://api.aksarakan.com/document';
// if(!$path) {
//     throw new Error('path not set');
// }
// if(!$token) {
//     throw new Error('path not set');
// }
// $client = new \GuzzleHttp\Client();
// $response = $client->request('PUT', "$url/$type", [
//     'headers' => ['Authentication' => "bearer $token"],
//     'multipart' => [
//         [
//             'name'     => 'file',
//             'contents' => fopen($path, 'rb'),
//             'filename' => basename($path)
//         ],
//     ]
// ]);

// var_dump(json_decode($response->getBody()->getContents(), true));
        // webcam
        $reqfoto = $request->image;
        $foto = substr($reqfoto, strpos($reqfoto, ',') + 1);
        $foto = base64_decode($foto);
        $foto = \Image::make($foto);
        $logo = \Image::make(public_path('assets/images/logo/pertamina.png'));
        $logo->resize(200,100);
        $logo->greyscale();
        $logo->opacity(50);
        $foto->insert($logo, 'center')->stream();
        $file_name = time() . '.png';
        $path = public_path() . '/img/' . $file_name;
        file_put_contents($path, $foto);
        
        // end webcam

        

      


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
        return redirect('/');
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

        return redirect('/');
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
