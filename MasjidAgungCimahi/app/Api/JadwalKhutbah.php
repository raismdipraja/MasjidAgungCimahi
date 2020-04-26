<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class JadwalKhutbah extends Model
{
    protected $table = "jadwal_khutbah";
    protected $fillable = [
        "nama_ustad",
        "tanggal"
    ];
}
