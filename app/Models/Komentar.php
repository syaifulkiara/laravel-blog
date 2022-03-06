<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = "komentars";
    protected $fillable = ['konten', 'user_id', 'artikel_id'];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class,'artikel_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
