<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\User;
use Auth;
use Str;
class MainController extends Controller
{
    public function index()
    {
        $posts = Artikel::all();
        $features = Artikel::inRandomOrder()->orderBy('id','DESC')->get();
        return view('main', compact('posts','features'));
    }

    public function single($slug)
    {
        $posts      = Artikel::where('slug', $slug)->first();
        $comments   = Komentar::orderBy('created_at','DESC')->get();
        return view('single', compact('posts','comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'konten' => 'required|min:5'
        ]);
        $artikels               = Artikel::findOrFail($request->artikel_id);

        $komentars              = new Komentar;
        $komentars->konten      = $request->konten;
        $komentars->user_id     = Auth::user()->id;
        $komentars->artikel_id  = $request->artikel_id;
        $komentars->save();
        
        return redirect()->back();
    }
}
