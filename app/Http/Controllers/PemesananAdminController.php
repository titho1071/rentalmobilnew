<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananAdminController extends Controller
{
    // Tampilkan seluruh data pemesanan
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('pages.pemesanan_admin', compact('pemesanan'));
    }

    // Update hanya status pemesanan
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'status' => 'required|in:Menungggu,Konfirmasi,Batal', // validasi enum status
        ]);

        $pemesanan->update([
            'status' => $request->status,
        ]);

        return redirect()->route('pemesanan_admin')->with('success', 'Status pemesanan berhasil diperbarui.');
    }
}
