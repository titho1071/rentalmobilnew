<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'tbl_mobil';
    public $timestamps = false;
    protected $primaryKey = 'kode_mobil';
    protected $fillable = [
        'kode_mobil',
        'Merek_Mobil',
        'Jenis_Mobil',
        'Harga'
    ];
}
