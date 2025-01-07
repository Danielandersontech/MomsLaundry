@extends('layouts.app_pelanggan', ['title' => 'Profil Pengguna'])    
    
@section('content')    
<div class="container mt-4">    
    <div class="row justify-content-center">    
        <div class="col-md-8">    
            <div class="card shadow-sm">    
                <div class="card-header bg-primary text-white">    
                    <h5 class="mb-0">Profil Pengguna</h5>    
                </div>    
                <div class="card-body">    
                    <h5 class="card-title">Informasi Pribadi</h5>    
                    <ul class="list-group mb-4">    
                        <li class="list-group-item">    
                            <strong>Nama:</strong> {{ $currentUser->nama }}    
                        </li>    
                        <li class="list-group-item">    
                            <strong>Email:</strong> {{ $currentUser->email }}    
                        </li>    
                        <li class="list-group-item">    
                            <strong>No HP:</strong> {{ $currentUser->no_hp }}    
                        </li>    
                        <li class="list-group-item">    
                            <strong>Alamat:</strong> {{ $currentUser->alamat ?? 'Belum diisi' }}    
                        </li>    
                        <li class="list-group-item">    
                            <strong>Role:</strong> {{ ucfirst($currentUser->role) }}    
                        </li>    
                    </ul>    
                </div>    
            </div>    
        </div>    
    </div>    
</div>    
@endsection    
