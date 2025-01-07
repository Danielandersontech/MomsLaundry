@extends('layouts.app_pelanggan', ['title' => 'Paket Layanan'])  
  
@section('content')  
<div class="container mt-4">  
    <div class="row justify-content-center">  
        <div class="col-md-12">  
            <div class="card shadow-sm">  
                <div class="card-header bg-primary text-white">  
                    <h5 class="mb-0">Paket Layanan</h5>  
                </div>  
                <div class="card-body">
                    <table class="table table-striped">  
                        <thead>  
                            <tr>  
                                <th>NO</th>  
                                <th>Nama Paket</th>  
                                <th>Deskripsi</th>  
                                <th>Durasi (jam)</th>  
                                <th>Harga per kg</th>  
                                <th>Tanggal Dibuat</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                            @forelse ($packages as $package)  
                                <tr>  
                                    <td>{{ $loop->iteration }}</td>  
                                    <td>{{ $package->nama_paket }}</td>  
                                    <td>{{ $package->deskripsi }}</td>  
                                    <td>{{ $package->durasi }}</td>  
                                    <td>Rp {{ number_format($package->harga_per_kg, 2, ',', '.') }}</td>  
                                    <td>{{ $package->created_at->format('d-m-Y') }}</td>  
                                </tr>  
                            @empty  
                                <tr>  
                                    <td colspan="7" class="text-center">Tidak ada data paket layanan.</td>  
                                </tr>  
                            @endforelse  
                        </tbody>  
                    </table>  
                    {!! $packages->links() !!}  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
@endsection  
