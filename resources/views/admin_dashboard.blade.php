@extends('layouts.app_modern', ['title' => 'Data Pembayaran'])

@section('content')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .content-header {
        background-color: #ffffff;
        padding: 20px;
        border-bottom: 1px solid #dee2e6;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .small-box {
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        overflow: hidden;
    }

    .small-box:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .small-box .inner {
        padding: 20px;
        color: #fff;
    }

    .small-box.bg-primary {
        background-color: #007bff !important;
    }

    .small-box.bg-info {
        background-color: #17a2b8 !important;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        background-color: #ffffff;
    }

    .card-body {
        padding: 20px;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f8f9fa;
        color: #495057;
        font-weight: bold;
    }

    .text-warning {
        color: #ffc107 !important;
    }

    .text-success {
        color: #28a745 !important;
    }

    h3.mb-3 {
        color: #343a40;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .icon {
        font-size: 50px;
        margin-top: 10px;
    }

    .small-box-footer {
        display: block;
        text-align: center;
        padding: 10px;
        color: #fff;
        text-decoration: none;
        border-radius: 0 0 10px 10px;
        background: rgba(0, 0, 0, 0.1);
    }

    .small-box-footer:hover {
        background: rgba(0, 0, 0, 0.2);
    }

    .search-form {
        margin-bottom: 20px;
    }

    .btn-primary {
        margin-right: 10px;
    }

    /* New styles for better aesthetics */
    .container-fluid {
        padding: 20px;
    }

    .row {
        margin-bottom: 20px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }

    .table-striped tbody tr:hover {
        background-color: #e9ecef;
    }

    .status-label {
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
        color: #fff;
    }

    .status-pending {
        background-color: #ffc107;
    }

    .status-success {
        background-color: #28a745;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <p>Jumlah Member</p>
                        <h3>{{ $totalMembers }}</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{{ route('pengguna.index') }}" class="small-box-footer">Lihat member <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Jumlah Transaksi</p>
                        <h3>{{ $totalTransactions }}</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('order.index') }}" class="small-box-footer">Lihat transaksi <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">Transaksi Berjalan (Priority Service): </h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Berat (kg)</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                    <th>Tanggal Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($priorityTransactions as $index => $transaction)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->tgl_order)->format('d - m - Y') }}</td>
                                    <td>{{ $transaction->berat_kg }}</td>
                                    <td>Rp {{ number_format($transaction->subtotal, 2, ',', '.') }}</td>
                                    <td>
                                        <span class="status-label {{ $transaction->status === 'Pending' ? 'status-pending' : 'status-success' }}">
                                            {{ $transaction->status }}
                                        </span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->tgl_order)->format('d - m - Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">Transaksi Berjalan: </h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Berat (kg)</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                    <th>Tanggal Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ongoingTransactions as $index => $transaction)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->tgl_order)->format('d - m - Y') }}</td>
                                    <td>{{ $transaction->berat_kg }}</td>
                                    <td>Rp {{ number_format($transaction->subtotal, 2, ',', '.') }}</td>
                                    <td>
                                        <span class="status-label {{ $transaction->status === 'Pending' ? 'status-pending' : 'status-success' }}">
                                            {{ $transaction->status }}
                                        </span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->tgl_order)->format('d - m - Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection