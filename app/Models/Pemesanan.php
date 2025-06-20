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
    'id_penyewaan',
    'nama_penyewa',
    'kode_mobil',
    'email',
    'alamat',
    'no_telepon',
    'tanggal_pengambilan',
    'tanggal_pengembalian',
    'alamat_pengambilan',
    'no_rekening_penjual',
    'total_pembayaran',
    'foto_bukti_bayar',
    'foto_ktp',
    'status',
];
}
