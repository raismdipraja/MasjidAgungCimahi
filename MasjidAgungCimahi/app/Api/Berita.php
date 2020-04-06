<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";
    protected $fillable = [
        "judul",
        "gambar",
        "teks"
    ];
}
