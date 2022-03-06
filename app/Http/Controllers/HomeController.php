<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\User;
use App\Models\Halaman;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artikel    = Artikel::all();
        $kategori   = Kategori::all();
        $komentar   = Komentar::all();
        $user       = User::all();
        $halamans   = Halaman::all();
        $artikels   = Artikel::orderBy('created_at','DESC')->get();
        $komentars  = Komentar::orderBy('created_at','DESC')->get();
        return view('home', compact('artikels','komentars','artikel','kategori','komentar','halamans','user'));
    }
}
