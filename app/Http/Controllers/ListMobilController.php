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
}
