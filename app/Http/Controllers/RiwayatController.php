<?php

namespace App\Http\Controllers;

use App\Models\RiwayatDiagnosa;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatDiagnosa::latest()->get();

        return view('riwayat', compact('riwayat'));
    }
}
