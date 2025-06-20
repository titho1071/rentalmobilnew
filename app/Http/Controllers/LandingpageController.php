<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Mobil;

class LandingpageController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::all();
        $mobil = Mobil::all();
        return view('pages.landingpage', compact('pemesanan', 'mobil'));
    }
    public function tambah(Request $request)
{
    $request->validate([
        'nama_penyewa' => 'required|string|max:255',
        'kode_mobil' => 'required|string',
        'email' => 'required|email',
        'alamat' => 'required|string',
        'no_telepon' => 'required|string|max:13',
        'tanggal_pengambilan' => 'required|date',
        'tanggal_pengembalian' => 'required|date',
        'alamat_pengambilan' => 'required|string',
        'no_rekening_penjual' => 'required|string',
        'total_pembayaran' => 'required|numeric',
        'foto_bukti_bayar' => 'required|file|mimes:jpg,jpeg,png,pdf',
        'foto_ktp' => 'required|file|mimes:jpg,jpeg,png,pdf',
    ]);

    $latest = Pemesanan::orderBy('id_penyewaan', 'desc')->first();
    $newId = $latest ? 'CR' . str_pad((int)substr($latest->id_penyewaan, 2) + 1, 3, '0', STR_PAD_LEFT) : 'CR001';

    // Simpan file
    $buktiBayar = $request->file('foto_bukti_bayar')->store('bukti_bayar', 'public');
    $ktp = $request->file('foto_ktp')->store('ktp', 'public');

    Pemesanan::create([
        'id_penyewaan' => $newId,
        'nama_penyewa' => $request->nama_penyewa,
        'kode_mobil' => $request->kode_mobil,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'no_telepon' => $request->no_telepon,
        'tanggal_pengambilan' => $request->tanggal_pengambilan,
        'tanggal_pengembalian' => $request->tanggal_pengembalian,
        'alamat_pengambilan' => $request->alamat_pengambilan,
        'no_rekening_penjual' => $request->no_rekening_penjual,
        'total_pembayaran' => $request->total_pembayaran,
        'foto_bukti_bayar' => $buktiBayar,
        'foto_ktp' => $ktp,
        'status' => 'Menunggu',
    ]);

    return redirect()->back()->with('success', 'Pemesanan berhasil dikirim!');
}




}