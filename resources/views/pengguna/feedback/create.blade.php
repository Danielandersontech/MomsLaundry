@extends('layouts.app_pelanggan', ['title' => 'Buat Feedback Baru'])  
  
@section('content')  
<div class="container mt-4">  
    <div class="row justify-content-center">  
        <div class="col-md-8">  
            <div class="card shadow-sm">  
                <div class="card-header bg-primary text-white">  
                    <h5 class="mb-0">Buat Feedback Baru</h5>  
                </div>  
                <div class="card-body">  
                    <form action="{{ route('pengguna.feedback.store') }}" method="POST">  
                        @csrf  
                        <div class="form-group mb-3">  
                            <label for="id_pengguna" class="form-label">Pengguna</label>  
                            <select name="id_pengguna" id="id_pengguna" class="form-control" readonly>  
                                <option value="{{ $currentUser->id_pengguna }}">  
                                    {{ $currentUser->id_pengguna }} - {{ $currentUser->nama }}  
                                </option>  
                            </select>  
                            <input type="hidden" name="id_pengguna" value="{{ $currentUser->id_pengguna }}">  
                            @error('id_pengguna')  
                                <span class="text-danger">{{ $message }}</span>  
                            @enderror  
                        </div>  
  
                        <div class="form-group mb-3">  
                            <label for="id_order" class="form-label">Order</label>  
                            <select name="id_order" id="id_order" class="form-control">  
                                <option value="">-- Pilih Order --</option>  
                                @foreach ($orders as $order)  
                                    <option value="{{ $order->id_order }}">{{ $order->id_order }}</option>  
                                @endforeach  
                            </select>  
                            @error('id_order')  
                                <span class="text-danger">{{ $message }}</span>  
                            @enderror  
                        </div>  
  
                        <div class="form-group mb-3">  
                            <label for="rating" class="form-label">Rating</label>  
                            <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" value="{{ old('rating') }}">  
                            @error('rating')  
                                <span class="text-danger">{{ $message }}</span>  
                            @enderror  
                        </div>  
  
                        <div class="form-group mb-3">  
                            <label for="komentar" class="form-label">Komentar</label>  
                            <textarea name="komentar" id="komentar" class="form-control" rows="4">{{ old('komentar') }}</textarea>  
                            @error('komentar')  
                                <span class="text-danger">{{ $message }}</span>  
                            @enderror  
                        </div>  
  
                        <button type="submit" class="btn btn-primary">Simpan</button>  
                    </form>  
                </div>  
            </div>  
        </div>  
  
        <div class="col-md-8 mt-4">  
            <div class="card">  
                <div class="card-body">  
                    <h5>Riwayat Feedback</h5>  
                    <table class="table">  
                        <thead class="thead-light">  
                            <tr>  
                                <th>No</th>  
                                <th>Tanggal</th>  
                                <th>Order ID</th>  
                                <th>Rating</th>  
                                <th>Komentar</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                            @foreach ($feedbacks as $index => $feedback)  
                                <tr>  
                                    <td>{{ $index + 1 }}</td>  
                                    <td>{{ $feedback->created_at->format('d M Y') }}</td>  
                                    <td>{{ $feedback->id_order }}</td>  
                                    <td>{{ $feedback->rating }}</td>  
                                    <td>{{ $feedback->komentar }}</td>  
                                </tr>  
                            @endforeach  
                        </tbody>  
                    </table>  
                    @if($feedbacks->isEmpty())  
                        <div class="alert alert-info" role="alert">  
                            Tidak ada riwayat feedback.  
                        </div>  
                    @endif  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
@endsection  
