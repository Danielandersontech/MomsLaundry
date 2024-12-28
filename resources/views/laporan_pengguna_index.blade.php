@extends('layouts.app_modern_laporan')

@section('content')
    <div class="card">
        <h3><i class="fas fa-users icon"></i> LAPORAN DATA PENGGUNA</h3>

        {{-- Tampilkan Filter Aktif --}}
        <div class="filter-active">
            <strong>Filter Aktif:</strong>
            <ul>
                @if(request()->filled('tanggal_mulai') || request()->filled('tanggal_selesai'))
                    <li>
                        Tanggal Daftar:
                        {{ request('tanggal_mulai') ? \Carbon\Carbon::parse(request('tanggal_mulai'))->format('d/m/Y') : 'Tidak dibatasi' }}
                        -
                        {{ request('tanggal_selesai') ? \Carbon\Carbon::parse(request('tanggal_selesai'))->format('d/m/Y') : 'Tidak dibatasi' }}
                    </li>
                @endif
            </ul>
        </div>

        {{-- Tabel Data Pengguna --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="1%">NO</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Role</th>
                    <th>Tgl Daftar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ ucfirst($item->role) }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
