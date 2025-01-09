@extends('layouts.app_modern_laporan')  
  
@section('content')  
    <div class="card">  
        <h3><i class="fas fa-shopping-cart icon"></i> LAPORAN DATA ORDER</h3>  
        <table class="table table-bordered">  
            <thead>  
                <tr>  
                    <th width="1%">NO</th>  
                    <th>ID Pengguna</th>  
                    <th>ID Package</th>  
                    <th>Berat (kg)</th>  
                    <th>Subtotal</th>  
                    <th>Tanggal Order</th>  
                    <th>Status</th>  
                    <th>Waktu Pengambilan</th>  
                    <th>Waktu Pengantaran</th>  
                </tr>  
            </thead>  
            <tbody>  
                @foreach ($models as $item)  
                    <tr>  
                        <td>{{ $loop->iteration }}</td>  
                        <td>{{ $item->id_pengguna }}</td>  
                        <td>{{ $item->id_package }}</td>  
                        <td>{{ number_format($item->berat_kg, 2) }}</td>  
                        <td>{{ number_format($item->subtotal, 2) }}</td>  
                        <td>{{ \Carbon\Carbon::parse($item->tgl_order)->format('d - m - Y') }}</td>  
                        <td>{{ ucfirst($item->status) }}</td>  
                        <td>{{ \Carbon\Carbon::parse($item->waktu_pengambilan)->format('d - m - Y ') }}</td>  
                        <td>{{ \Carbon\Carbon::parse($item->waktu_pengantaran)->format('d - m - Y ') }}</td>  
                    </tr>  
                @endforeach  
            <tfoot>  
                <tr>  
                    <td colspan="4">Total</td>  
                    <td>{{ number_format($models->sum('subtotal'), 2) }}</td>  
                    <td colspan="4"></td>  
                </tr>  
            </tfoot>  
            </tbody>  
        </table>  
    </div>  
@endsection  
