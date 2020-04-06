<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class PengajianRutin extends Model
{
    protected $table = "pengajian_rutin";
    protected $fillable = [
        "judul",
        "nama_ustad",
        "hari",
        "jam"
    ];
}
