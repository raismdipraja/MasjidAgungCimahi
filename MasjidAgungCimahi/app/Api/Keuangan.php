<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = "keuangan";
    protected $fillable = [
        "judul",
        "jumlah",
        "pengeluaran",   
        "nama_pemberi",
        "tanggal",
        "jenis_keuangan"
    ];
}
