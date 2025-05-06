<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show() {
        $data = [
            ['id' => 1, 'produk' => 'Laptop Gaming'],
            ['id' => 2, 'produk' => 'Smartphone'],
        ];
        return view('list_product', compact('data'));
    }
    
}
