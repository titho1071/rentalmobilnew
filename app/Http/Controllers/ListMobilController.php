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


}
