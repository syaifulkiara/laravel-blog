<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Artikel;
use App\Models\Kategori;
use Auth;
use Str;
use Alert;
class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::orderBy('created_at','DESC')->get();
        return view('artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('artikel.create', compact('kategoris'));
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
            'judul' => 'required|unique:artikels'
        ]);

        $artikels              = new Artikel;
        $artikels->kategori_id = $request->kategori_id;
        $artikels->judul       = $request->judul;
        $artikels->slug        = Str::slug($artikels->judul).'-'.time();
        $artikels->penulis     = Auth::user()->name;
        $artikels->konten      = $request->konten;
        if($request->file('gambar')) {
             $file          = $request->file('gambar');
             $filename      = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/artikel', $filename);
             $artikels->gambar   = 'images/artikel/'.$filename;
         }
        $artikels->save();
        Alert::success('Berhasil', 'Berhasil Membuat Artikel');
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikels = Artikel::find($id);
        return view('artikel.show', compact('artikels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikels = Artikel::find($id);
        $kategoris = Kategori::all();
        return view('artikel.edit', compact('artikels','kategoris'));
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
            'judul' => 'required'
        ]);
        $artikels = Artikel::find($id);
        $artikels->kategori_id = $request->kategori_id;
        $artikels->judul       = $request->judul;
        $artikels->konten      = $request->konten;
        if($request->file('gambar')) {
             $file          = $request->file('gambar');
             $filename      = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/artikel', $filename);
             
             File::delete(public_path($artikels->gambar));
             $artikels->gambar   = 'images/artikel/'.$filename;
         }
        $artikels->save();
        Alert::success('Berhasil', 'Berhasil Ubah Artikel');
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikels = Artikel::find($id);
        $artikels->delete();
        Alert::success('Berhasil', 'Berhasil Hapus Artikel');
        return redirect()->back();
    }
}
