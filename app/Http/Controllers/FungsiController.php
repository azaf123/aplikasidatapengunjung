<?php

namespace App\Http\Controllers;

use App\Models\Fungsi;
use Illuminate\Http\Request;

class FungsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fungsi = Fungsi::all();
        return view('function.index', compact('fungsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('function.create');
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
                'namafungsi' => 'required|min:3|max:100',

            ],
            [
                'namafungsi.required' => 'nama fungsi is required',
                'namafungsi.required' => 'nama fungsi is required',
                'namafungsi.min' => 'min 3 words',
                'namafungsi.max' => 'max 100 words',

            ]
        );

        Fungsi::create(
            [
                'nama_fungsi' => $request->namafungsi
            ]
        );
        return redirect('/fungsi')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fungsi  $fungsi
     * @return \Illuminate\Http\Response
     */
    public function show(Fungsi $fungsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fungsi  $fungsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Fungsi $fungsi)
    {
        return view('function.update', compact('fungsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fungsi  $fungsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fungsi $fungsi)
    {
        $request->validate(
            [
                'namafungsi' => 'required|min:3|max:100',

            ],
            [
                'namafungsi.required' => 'nama fungsi is required',
                'namafungsi.required' => 'nama fungsi is required',
                'namafungsi.min' => 'min 3 words',
                'namafungsi.max' => 'max 100 words',

            ]
        );

        Fungsi::where('id', $fungsi->id)->update(
            [
                'nama_fungsi' => $request->namafungsi
            ]
        );
        return redirect('/fungsi')->with('status', 'Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fungsi  $fungsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fungsi $fungsi)
    {
        Fungsi::destroy('id', $fungsi->id);
        return redirect('/fungsi')->with('status','Berhasil Dihapus');
    }
}
