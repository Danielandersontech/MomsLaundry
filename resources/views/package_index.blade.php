@extends('layouts.app_modern', ['title' => 'Data Paket Layanan'])  
@section('content')  
    <div class="card">  
        <h5 class="card-header">Data Paket Layanan</h5>  
        <div class="card-body">  
            <form action="">  
                <div class="row g-3 mb-2">  
                    <div class="col">  
                        <input type="text" name="q" class="form-control" placeholder="Nama Paket" value="{{ request('q') }}">  
                    </div>  
                    <div class="col">  
                        <button type="submit" class="btn btn-primary">CARI</button>  
                    </div>  
                </div>  
            </form>  
            <div class="row mb-3 mt-3">  
                <div class="col-md-6">  
                    <a href="/admin/package/create" class="btn btn-primary btn-sm">Tambah Data</a>  
                </div>  
            </div>  
            <table class="table table-striped table-bordered">  
                <thead>  
                    <tr>  
                        <th>NO</th>  
                        <th>Nama Paket</th>  
                        <th>Deskripsi</th>  
                        <th>Durasi (jam)</th>  
                        <th>Harga per kg</th>  
                        <th>Tanggal Dibuat</th>  
                        <th>AKSI</th>  
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
                            <td>  
                                <div class="d-flex align-items-center">  
                                    <a href="/admin/package/{{ $package->id_package }}/edit" class="btn btn-warning btn-sm me-1">Edit</a>  
                                    <form action="/admin/package/{{ $package->id_package }}" method="POST" class="d-inline">  
                                        @csrf  
                                        @method('delete')  
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>  
                                    </form>  
                                </div>  
                            </td>  
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
