<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use Auth;
use Alert;
class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komentars = Komentar::all();
        return view('komentar.index', compact('komentars'));
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
        $request->validate([
            'konten' => 'required|min:5'
        ]);
        $artikels = Artikel::findOrFail($request->artikel_id);

        $komentars              = new Komentar;
        $komentars->konten      = $request->konten;
        $komentars->user_id     = Auth::user()->id;
        $komentars->artikel_id  = $request->artikel_id;
        $komentars->save();
        Alert::success('Berhasil', 'Berhasil Memberikan Komentar');
        return redirect()->back();
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
        $komentars = Komentar::find($id);
        $komentars->delete();
        Alert::success('Berhasil', 'Berhasil Hapus Komentar');
        return redirect()->back();
    }
}
