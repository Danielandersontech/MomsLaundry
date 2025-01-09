<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Pengguna;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;  

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->filled('q')) {
            $data['orders'] = Order::search(request('q'))->paginate(10);
        } else {
            $data['orders'] = Order::latest()->paginate(10);
        }
        return view('order_index', $data);
    }

    public function create()
    {
        $listPengguna = Pengguna::all(); // Ambil semua data pengguna
        $listPackage = Package::all();  // Ambil semua data package

        return view('order_create', [
            'listPengguna' => $listPengguna,
            'listPackage' => $listPackage
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pengguna' => 'required|exists:penggunas,id_pengguna',
            'id_package' => 'required|exists:packages,id_package',
            'berat_kg' => 'required|numeric|min:0',
            'tgl_order' => 'required|date',
            'waktu_pengambilan' => 'nullable|date',
            'waktu_pengantaran' => 'nullable|date',
            'status' => 'required|in:Pending,Selesai,Dibatalkan',
        ]);

        $subtotal = Package::find($validated['id_package'])->harga_per_kg * $validated['berat_kg'];

        Order::create([
            'id_pengguna' => $validated['id_pengguna'],
            'id_package' => $validated['id_package'],
            'berat_kg' => $validated['berat_kg'],
            'subtotal' => $subtotal,
            'tgl_order' => $validated['tgl_order'],
            'waktu_pengambilan' => $validated['waktu_pengambilan'],
            'waktu_pengantaran' => $validated['waktu_pengantaran'],
            'status' => $validated['status'],
        ]);

        return redirect('/admin/order')->with('success', 'Order berhasil dibuat.');
    }

    public function show(string $id)
    {
        $order = Order::with(['pengguna', 'package'])->findOrFail($id);
        return view('order_show', ['order' => $order]);
    }
    public function edit(Order $order)
    {
        $listPengguna = Pengguna::all();
        $listPackage = Package::all();

        return view('order_edit', [
            'order' => $order,
            'listPengguna' => $listPengguna,
            'listPackage' => $listPackage
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'id_pengguna' => 'required|exists:penggunas,id_pengguna',
            'id_package' => 'required|exists:packages,id_package',
            'berat_kg' => 'required|numeric|min:0',
            'tgl_order' => 'required|date',
            'waktu_pengambilan' => 'nullable|date',
            'waktu_pengantaran' => 'nullable|date',
            'status' => 'required|in:Pending,Selesai,Dibatalkan',
        ]);

        $subtotal = Package::find($validated['id_package'])->harga_per_kg * $validated['berat_kg'];

        $order->update([
            'id_pengguna' => $validated['id_pengguna'],
            'id_package' => $validated['id_package'],
            'berat_kg' => $validated['berat_kg'],
            'subtotal' => $subtotal,
            'tgl_order' => $validated['tgl_order'],
            'waktu_pengambilan' => $validated['waktu_pengambilan'],
            'waktu_pengantaran' => $validated['waktu_pengantaran'],
            'status' => $validated['status'],
        ]);

        return redirect('/admin/order')->with('success', 'Order berhasil diperbarui.');
    }
    public function destroy(Order $order)
    {

        $order->delete();
        flash('Data Order Berhasil dihapus')->success();
        return back();
    }

    public function order()
    {
        $currentUser = Auth::user(); 
        $orders = $currentUser->orders()->latest()->paginate(10); 

        return view('pengguna.order', compact('orders'));
    }

    public function printReceipt($id)
    {
        $order = Order::with(['pengguna', 'package'])->findOrFail($id); 

        return view('pengguna.printOrder', compact('order'));
    }
}
