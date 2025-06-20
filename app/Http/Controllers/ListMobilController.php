<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class ListMobilController extends Controller
{
    public function show()
    {
        // Pastikan ini mengembalikan collection, bukan string
        $mobil = Mobil::all(); 

        return view('list_mobil', compact('mobil'));
    }

  public function simpan(Request $request) 
{

    $mobil = new Mobil; 
    $mobil->Merek_Mobil = $request->input('Merek_Mobil'); 
    $mobil->Jenis_Mobil = $request->input('Jenis_Mobil'); 
    $mobil->Harga = $request->input('Harga'); 
    $mobil->save(); 

    return redirect()->back()->with('success', 'Data berhasil disimpan!');
}

    public function update(Request $request, $id)
        {
            // Validasi input
            $request->validate([
                'Merek_Mobil' => 'required|string|max:255',
                'Jenis_Mobil' => 'required|string|max:255',
                'Harga' => 'required|numeric',
            ]);

            // Ambil data mobil berdasarkan ID
            $mobil = Mobil::findOrFail($id);

            // Update data
            $mobil->Merek_Mobil = $request->Merek_Mobil;
            $mobil->Jenis_Mobil = $request->Jenis_Mobil;
            $mobil->Harga = $request->Harga;
            $mobil->save();

            // Redirect dengan pesan sukses
            return redirect()->route('mobil.list')->with('success', 'Data mobil berhasil diperbarui!');
        }
            public function delete($kode_mobil)
        {
            $mobil = Mobil::where('kode_mobil', $kode_mobil)->first();

            if ($mobil) {
                $mobil->delete();
                return redirect()->route('mobil.list')->with('success', 'Mobil berhasil dihapus.');
            } else {
                return redirect()->route('mobil.list')->with('error', 'Mobil tidak ditemukan.');
            }
        }

}
