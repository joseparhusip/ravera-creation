<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama untuk user.
     */
    public function index()
    {
        // Mengembalikan view dari folder user dengan nama file home.blade.php
        return view('user.home');
    }
}