<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $fillable = [
        "buku_id",	
        "users_id",
        "tgl_pinjam",
        "tgl_kembali",
        "status",
        "jumlah_pinjaman"
    ];
}
