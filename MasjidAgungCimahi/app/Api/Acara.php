<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = "acara";
    protected $fillable = [
        "nama_acara",
        "nama_ustad",
        "gambar",
        "jenis_acara"
    ];
}
