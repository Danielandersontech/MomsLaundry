@extends('layouts.app_modern', ['title' => 'Detail Pesanan'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">DETAIL PESANAN {{ strtoupper($order->pengguna->nama) }}</div>
                <div class="card-body">
                    <h4>Data Pengguna</h4>
                    <table width="100%">
                        <tbody>
                            <tr>
                                <th width="15%">ID Pengguna</th>
                                <td> : {{ $order->pengguna->id_pengguna }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pengguna</th>
                                <td> : {{ $order->pengguna->nama }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4>Data Paket Layanan</h4>
                    <table width="100%">
                        <tbody>
                            <tr>
                                <th width="15%">ID Paket</th>
                                <td> : {{ $order->package->id_package }}</td>
                            </tr>
                            <tr>
                                <th>Nama Paket</th>
                                <td> : {{ $order->package->nama_paket }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4>Detail Pesanan</h4>
                    <table width="100%">
                        <tbody>
                            <tr>
                                <th width="15%">No Pesanan</th>
                                <td> : {{ $order->id_order }}</td>
                            </tr>
                            <tr>
                                <th>Berat (kg)</th>
                                <td> : {{ $order->berat_kg }}</td>
                            </tr>
                            <tr>
                                <th>Subtotal</th>
                                <td> : Rp {{ number_format($order->subtotal, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td> : {{ ucfirst($order->status) }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pesanan</th>
                                <td> : {{ $order->tgl_order }}</td>
                            </tr>
                            <tr>
                                <th>Waktu Pengambilan</th>
                                <td> : {{ $order->waktu_pengambilan }}</td>
                            </tr>
                            <tr>
                                <th>Waktu Pengantaran</th>
                                <td> : {{ $order->waktu_pengantaran }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4>Riwayat Pesanan</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pesanan</th>
                                <th>Berat (kg)</th>
                                <th>Subtotal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->pengguna->orders as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tgl_order }}</td>
                                <td>{{ $item->berat_kg }}</td>
                                <td>Rp {{ number_format($item->subtotal, 2, ',', '.') }}</td>
                                <td>{{ ucfirst($item->status) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <form action="/order/{{ $order->id_order }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="Dibatalkan" {{ $order->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Perbarui Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
