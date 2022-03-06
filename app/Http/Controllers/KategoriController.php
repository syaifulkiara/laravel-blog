<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Str;
Use Alert;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::orderBy('created_at','DESC')->get();
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
                'nama'          => 'required|unique:kategoris',
                'keterangan'    => 'required'
        ]);

        $kategoris              = new Kategori;
        $kategoris->nama        = $request->nama;
        $kategoris->slug        = Str::slug($kategoris->nama);
        $kategoris->keterangan  = $request->keterangan;

        $kategoris->save();
        Alert::success('Berhasil', 'Berhasil Membuat Kategori');
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
        $kategori           = Kategori::find($id);
        $kategoris          = Kategori::all();
        return view('kategori.edit', compact('kategori','kategoris'));
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
        $request->validate([
                'nama'         => 'required',
                'keterangan'   => 'required'
        ]);

        $kategoris              = Kategori::find($id);
        $kategoris->nama        = $request->nama;
        $kategoris->keterangan  = $request->keterangan;

        $kategoris->save();
        Alert::success('Berhasil', 'Berhasil Merubah Kategori');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoris              = Kategori::find($id);
        $kategoris->delete();
        Alert::success('Berhasil', 'Berhasil Hapus Kategori');
        return redirect()->back();
    }
}
