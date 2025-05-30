<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'tbl_pemesanan';
    protected $primaryKey = 'id_penyewaan';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'status',
        // tambahkan field lain di sini jika perlu di-update di masa depan
    ];
}
