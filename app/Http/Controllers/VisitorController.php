<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Fungsi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use App\Exports\VisitorExport;
use Maatwebsite\Excel\Facades\Excel;

class VisitorController extends Controller
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
        // orderby new visitor
        $visitor = Visitor::orderBy('id', 'desc')->get();
        return view('visitor.index',compact('visitor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $visitor = Visitor::all();
        $employee = Employee::all();
        $fungsi = Fungsi::all();
        $card = Card::where('status','inaktif')->get();
        return view('visitor.create', compact('visitor','employee','fungsi','card'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        // return $request;
        $request->validate(
            [
                'image'=> 'required',
                'namavisitor' => 'required|min:3|max:100',
                'alamat'=>'required',
                'fungsiid'=>'required',
                'karyawanid'=>'required',
                'keperluan'=>'required',
                'nokartu'=>'required',
                'status'=>'required',
                'nokontak'=>'required'


            ],
            [
                
                'image.required'=>'Foto diperlukan',
                'namavisitor.required' => 'Nama Karyawan Diperlukan',
                'namavisitor.min' => 'min 3 kata',
                'namavisitor.max' => 'max 100 kata',
                'alamat.required' => 'Nomor Pegawai Diperlukan',
                'fungsiid.required' => 'Nama Fungsi Diperlukan',
                'karyawanid.required'=> 'Nama karyawan diperlukan',
                'keperluan.required'=> 'keperluan diperlukan',
                'nokontak.required'=> 'Nomor Kontak HP diperlukan'
                

            ]
        );

    

        $img = $request->file('image'); //mengambil file dari form
        // return $img;
        $file_name = time()."_". $img->getClientOriginalName(); //mengambil dan mengedit nama file dari form
        $img =\Image::make($img);
        $logo = \Image::make(public_path('assets/images/logo/pertamina.png'));
        $logo->resize(400,300);
        $logo->greyscale();
        $img->insert($logo,'center');
        // $img->insert($logo,'top-right',210,0);  
        $img->save(public_path('img/'.$file_name)); //proses memasukkan image ke dalam direktori laravel
       
        Visitor::create(
            [
                'image'=>$file_name,
                'nama_pengunjung' => $request->namavisitor,
                'alamat' => $request->alamat,
                'fungsi_id' => $request->fungsiid,
                'employee_id'=> $request->karyawanid,
                'keperluan'=>$request->keperluan,
                'card_id'=>$request->nokartu,
                'status'=>$request->status,
                'contact'=>$request->nokontak
            ]);
            Card::where('id', $request->nokartu)->update([
                'status'=> 'aktif'
            ]);
            toast('Berhasil Ditambahkan','success');  
        return redirect('/master-data/visitor')->with('status');
    }

    public function showPdf(){
        $visitor = Visitor::all();
        $pdf = PDF::loadView('visitor.pdf', compact('visitor'));
        return $pdf->download('visitor.pdf');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        return view('visitor.detail',compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        // return $visitor;
        $fungsi= Fungsi::all();
        $employee= Employee::all();
        return view('visitor.update',compact('visitor','fungsi','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        
        $request->validate(
            [
                'namavisitor' => 'required|min:3|max:100',
                'alamat'=>'required',
                'fungsiid'=>'required',
                'karyawanid'=>'required',
                'keperluan'=>'required',
                'status'=>'required',
                'nokontak'=>'required'
            ],
            [
               
                'namavisitor.required' => 'Nama Karyawan Diperlukan',
                'namavisitor.min' => 'min 3 kata',
                'namavisitor.max' => 'max 100 kata',
                'alamat.required' => 'Nomor Pegawai Diperlukan',
                'fungsiid.required' => 'Nama Fungsi Diperlukan',
                'karyawanid.required'=> 'Nama karyawan diperlukan',
                'keperluan.required'=> 'keperluan diperlukan',
                'nokontak.required'=> 'Nomor Kontak HP diperlukan'

            ]
        );
            Visitor::where('id', $visitor->id)->update(
                [
                'nama_pengunjung' => $request->namavisitor,
                'alamat' => $request->alamat,
                'fungsi_id' => $request->fungsiid,
                'employee_id'=> $request->karyawanid,
                'keperluan'=>$request->keperluan,
                'status'=>$request->status,
                'contact'=>$request->nokontak
                ]
                );
      
            
          
                toast('Berhasil Diperbarui','success');  
        return redirect('/master-data/visitor')->with('status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        Visitor::destroy('id', $visitor->id);
        Card::where('id',$visitor->card_id)->update([
            'status'=>'inaktif'
        ]);
        toast('Berhasil Dihapus','success');  
        return redirect('/master-data/visitor')->with('status');
 
    }
// ajax
    public function karyawanTofungsi($id){
        $karyawan = Employee::where('fungsi_id',$id)->get();
        return response()->json($karyawan);
    }
    public function visitorToAlamat($id){
        $visitor = Visitor::find($id);
        return response()->json($visitor);  
    }

    public function keluarForm(){
        $card = Card::where('status','aktif')->get();
        return view('visitor.keluar',compact('card'));
    }

    public function keluar(Request $request){
        // return $request;
        $visitor = Visitor::where('card_id', $request->nokartu)
        ->where('status','datang')->first();
        // return $visitor;

        Visitor::where('id', $visitor->id)->update(
            [
                'status'=>'pulang'
            ]
            
        );
        Card::Where('id', $request->nokartu)->update([
            'status'=>'inaktif'

        ]);

        return redirect('/master-data/visitor');
    }
    
    public function visitorexport(){
       
        return Excel::download(new VisitorExport,'visitor.xlsx');
    }
}
