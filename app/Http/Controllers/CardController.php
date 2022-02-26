<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card = Card::all();
        return view('card.index', compact('card'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('card.create');
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
                'nokartu' => 'required',
                'status' => 'required'
            ],
            [
                'nokartu.required'=>'Nomor Kartu diperlukan',
                'status.required'=>'Status diperlukan'
            ]
        );

        Card::create([
            'no_kartu'=> $request->nokartu,
            'status'=> $request->status
        ]);
        return redirect('/card')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        $card = Card::all();
        return view('card.update', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $request->validate(
            [
                'nokartu' => 'required',
                'status' => 'required'
            ],
            [
                'nokartu.required'=>'Nomor Kartu diperlukan',
                'status.required'=>'Status diperlukan'
            ]
        );

        Card::where('id', $card->id)->update([
            'no_kartu'=> $request->nokartu,
            'status'=> $request->status
        ]);
        return redirect('/card')->with('status', 'Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        card::destroy('id', $card->id);
        return redirect('/card')->with('status','Berhasil Dihapus');
    }
}
