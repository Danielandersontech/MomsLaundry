<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class LaporanOrderController extends Controller
{
    public function index(Request $request)
    {
        $models = Order::query();
        
        // Filter berdasarkan tanggal mulai
        if ($request->filled('tanggal_mulai')) {
            $models->whereDate('tgl_order', '>=', $request->tanggal_mulai);
        }
        
        // Filter berdasarkan tanggal akhir
        if ($request->filled('tanggal_akhir')) {
            $models->whereDate('tgl_order', '<=', $request->tanggal_akhir);
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $models->where('status', $request->status);
        }

        // Filter berdasarkan berat minimal
        if ($request->filled('berat_min')) {
            $models->where('berat_kg', '>=', $request->berat_min);
        }

        // Filter berdasarkan berat maksimal
        if ($request->filled('berat_max')) {
            $models->where('berat_kg', '<=', $request->berat_max);
        }

        // Ambil data yang sudah difilter
        $data['models'] = $models->latest()->get();
        
        return view('laporan_order_index', $data);
    }

    public function create()
    {
        return view('laporan_order_create');
    }
}
