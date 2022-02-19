<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officer = Officer::all();
        return view('officer.index', compact('officer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('officer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'namapetugas' => 'required|min:3|max:100',
                'nopegawai'=> 'required',
                // 'username'=>'required',
                // 'password'=>'required'

            ],
            [
                'namapetugas.required' => 'Nama Petugas dibutuhkan',
                'namapetugas.min' => 'min 3 kata',
                'namapetugas.max' => 'max 100 kata',
                'nopegawai.required' => 'Nomor Pegawai dibutuhkan'

            ]
        );

        Officer::create(
            [
                'nama_petugas' => $request->namapetugas,
                'no_pegawai'=> $request->nopegawai

            ]
        );
        return redirect('/officer')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        return view('officer.update',compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        $request->validate(
            [
                'namapetugas' => 'required|min:3|max:100',
                'nopegawai'=> 'required'
                // 'username'=>'required',
                // 'password'=>'required'

            ],
            [
                'namapetugas.required' => 'Nama Petugas dibutuhkan',
                'namapetugas.min' => 'min 3 kata',
                'namapetugas.max' => 'max 100 kata',
                'nopegawai.required' => 'Nomor Pegawai dibutuhkan'

            ]
        );

        Officer::where('id', $officer->id)->update(
            [
                'nama_petugas' => $request->namapetugas,
                'no_pegawai'=> $request->nopegawai

            ]
        );
        return redirect('/officer')->with('status', 'Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        Officer::destroy('id', $officer->id);
        return redirect('/officer')->with('status','Berhasil Dihapus');
    }
}
