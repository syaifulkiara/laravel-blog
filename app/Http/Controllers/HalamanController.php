<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Halaman;
use Alert;
use Str;
class HalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halamans = Halaman::orderBy('created_at','DESC')->get();
        return view('halaman.index', compact('halamans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman.create');
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
            'judul'      => 'required',
            'konten'     => 'required'
        ]);

        $halamans           = new Halaman;
        $halamans->judul    = $request->judul;
        $halamans->slug     = Str::slug($halamans->judul);
        $halamans->konten   = $request->konten;
        if($request->file('gambar')) {
             $file          = $request->file('gambar');
             $filename      = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/halaman', $filename);
             $halamans->gambar = '/images/halaman/'.$filename;
         }
        $halamans->save();
        Alert::success('Berhasil', 'Berhasil Membuat Halaman');
        return redirect()->route('halaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $halamans = Halaman::find($id);
        return view('halaman.show', compact('halamans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $halamans = Halaman::find($id);
        return view('halaman.edit', compact('halamans'));
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
            'judul'      => 'required',
            'konten'     => 'required'
        ]);

        $halamans           = Halaman::find($id);
        $halamans->judul    = $request->judul;
        $halamans->konten   = $request->konten;
        if($request->file('gambar')) {
             $file          = $request->file('gambar');
             $filename      = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/halaman', $filename);
             $halamans->gambar = '/images/halaman/'.$filename;
         }
        $halamans->save();
        Alert::success('Berhasil', 'Berhasil Merubah Halaman');
        return redirect()->route('halaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $halamans = Halaman::find($id);
        $halamans->delete();
        Alert::success('Berhasil', 'Berhasil Hapus Halaman');
        return redirect()->back();
    }
}
