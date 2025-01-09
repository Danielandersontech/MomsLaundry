@extends('layouts.app_modern', ['title' => 'Data Pesanan'])      
@section('content')      
    <div class="card">      
        <h5 class="card-header">Data Pesanan</h5>      
        <div class="card-body">      
            <form action="">      
                <div class="row g-3 mb-2">      
                    <div class="col">      
                        <input type="text" name="q" class="form-control" placeholder="Nama Pengguna"      
                            value="{{ request('q') }}">      
                    </div>      
                    <div class="col">      
                        <button type="submit" class="btn btn-primary">CARI</button>      
                    </div>      
                </div>      
            </form>      
            <div class="row mb-3 mt-3">      
                <div class="col-md-6">      
                    <a href="/admin/order/create" class="btn btn-primary btn-sm">Tambah Data</a>      
                </div>      
            </div>      
            <table class="table table-striped table-bordered">      
                <thead>      
                    <tr>      
                        <th>NO</th>      
                        <th>Pelanggan</th>      
                        <th>Paket Layanan</th>      
                        <th>Berat (kg)</th>      
                        <th>Subtotal</th>      
                        <th>Status</th>      
                        <th>Tanggal Pesanan</th>      
                        <th>Waktu Pengambilan</th>      
                        <th>Waktu Pengantaran</th>      
                        <th>AKSI</th>      
                    </tr>      
                </thead>      
                <tbody>      
                    @forelse ($orders as $order)      
                        <tr>      
                            <td>{{ $loop->iteration }}</td>      
                            <td>{{ $order->pengguna->nama }}</td>      
                            <td>{{ $order->package->nama_paket }}</td>      
                            <td>{{ $order->berat_kg }}</td>      
                            <td>Rp {{ number_format($order->subtotal, 2, ',', '.') }}</td>      
                            <td>{{ ucfirst($order->status) }}</td>      
                            <td>{{ \Carbon\Carbon::parse($order->tgl_order)->format('d - m - Y') }}</td>      
                            <td>{{ \Carbon\Carbon::parse($order->waktu_pengambilan)->format('d - m - Y') }}</td>      
                            <td>{{ \Carbon\Carbon::parse($order->waktu_pengantaran)->format('d - m - Y') }}</td>      
                            <td>      
                                <a href="/admin/order/{{ $order->id_order }}" class="btn btn-info btn-sm">Detail</a>      
                                <a href="/admin/order/{{ $order->id_order }}/edit" class="btn btn-warning btn-sm">Edit</a>      
                                <form action="/admin/order/{{ $order->id_order }}" method="POST" class="d-inline">      
                                    @csrf      
                                    @method('delete')      
                                    <button class="btn btn-danger btn-sm"      
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>      
                                </form>      
                            </td>      
                        </tr>      
                    @empty      
                        <tr>      
                            <td colspan="10" class="text-center">Tidak ada data pesanan.</td>      
                        </tr>      
                    @endforelse      
                </tbody>      
            </table>      
            {!! $orders->links() !!}      
        </div>      
    </div>      
@endsection      
  
<style>  
    .table th, .table td {  
        vertical-align: middle;
        text-align: center;  
        padding: 10px;  
    }  
  
    .table-bordered {  
        border: 1px solid #dee2e6;
    }  
  
    .table-bordered th, .table-bordered td {  
        border: 1px solid #dee2e6; 
    }  
  
    .table-striped tbody tr:nth-of-type(odd) {  
        background-color: #f9f9f9;  
    }  
  
    .table-striped tbody tr:hover {  
        background-color: #e2e6ea; 
    }  
</style>  
