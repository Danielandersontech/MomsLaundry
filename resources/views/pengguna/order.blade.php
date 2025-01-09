@extends('layouts.app_pelanggan', ['title' => 'Data Pesanan'])      
  
@section('content')      
<div class="container mt-4">      
    <div class="row justify-content-center">      
        <div class="col-md-12">      
            <div class="card shadow-sm">      
                <div class="card-header bg-primary text-white">      
                    <h5 class="mb-0">Data Pesanan</h5>      
                </div>      
                <div class="card-body">      
                    <table class="table table-striped">      
                        <thead>      
                            <tr>      
                                <th>NO</th>      
                                <th>Paket Layanan</th>      
                                <th>Berat (kg)</th>      
                                <th>Subtotal</th>      
                                <th>Status</th>      
                                <th>Tanggal Pesanan</th>      
                                <th>Aksi</th>    
                            </tr>      
                        </thead>      
                        <tbody>      
                            @forelse ($orders as $index => $order)      
                                <tr>      
                                    <td>{{ $index + 1 }}</td>      
                                    <td>{{ $order->package->nama_paket }}</td>      
                                    <td>{{ $order->berat_kg }}</td>      
                                    <td>Rp {{ number_format($order->subtotal, 2, ',', '.') }}</td>      
                                    <td>{{ ucfirst($order->status) }}</td>      
                                    <td>{{ \Carbon\Carbon::parse($order->tgl_order)->format('d - m - Y') }}</td>      
                                    <td>    
                                        <a href="{{ route('pengguna.printOrder', $order->id_order) }}" class="btn btn-success btn-sm">Cetak Resi</a>    
                                    </td>      
                                </tr>      
                            @empty      
                                <tr>      
                                    <td colspan="7" class="text-center">Tidak ada data pesanan.</td>      
                                </tr>      
                            @endforelse      
                        </tbody>      
                    </table>      
                    {!! $orders->links() !!}      
                </div>      
            </div>      
        </div>      
    </div>      
</div>      
@endsection    
