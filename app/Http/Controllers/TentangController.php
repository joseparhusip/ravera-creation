<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Menampilkan halaman "Tentang Kami".
     */
    public function index()
    {
        // Method ini akan memanggil view 'tentang.blade.php'
        // yang akan kita buat selanjutnya.
        return view('user.tentang');
    }
}