<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPenggunaController extends Controller
{
    public function index(Request $request)
    {
        // Query awal untuk model pengguna
        $pengguna = \App\Models\Pengguna::query();
        
        // Filter berdasarkan tanggal mulai
        if ($request->filled('tanggal_mulai')) {
            $pengguna->whereDate('created_at', '>=', $request->tanggal_mulai);
        }
        
        // Filter berdasarkan tanggal selesai
        if ($request->filled('tanggal_selesai')) {
            $pengguna->whereDate('created_at', '<=', $request->tanggal_selesai);
        }

        // Ambil data yang sudah difilter
        $data['models'] = $pengguna->latest()->get();
        
        // Tampilkan ke view
        return view('laporan_pengguna_index', $data);
    }

    public function create()
    {
        return view('laporan_pengguna_create');
    }
}
