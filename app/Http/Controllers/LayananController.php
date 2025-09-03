<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        // Ubah dari 'layanan' menjadi 'user.layanan'
        return view('user.layanan');
    }
}