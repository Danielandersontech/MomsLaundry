@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">Saran atau Komplain</h1>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Form Feedback hanya untuk Pengguna -->
            @if(auth()->user()->role == 'pengguna') <!-- Memeriksa role pengguna -->
            <div class="col-md-6">
                <h5>Silahkan isi form feedback Anda</h5>
                <form action="{{ route('pengguna.saran.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_order">Pilih Order</label>
                        <select class="form-control" id="id_order" name="id_order">
                            @foreach ($orders as $order)
                                <option value="{{ $order->id_order }}">{{ $order->order_number }} - {{ $order->created_at->format('d-m-Y') }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <select class="form-control" id="rating" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="komentar">Komentar</label>
                        <textarea class="form-control" id="komentar" name="komentar" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                </form>
            </div>
            @endif
            
            <!-- Riwayat Feedback -->
            <div class="col-md-12 mt-5">
                <h5>Riwayat Feedback Anda</h5>

                @if ($feedbacks->isEmpty())
                    <p>Anda belum memberikan feedback pada order manapun.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order</th>
                                <th>Rating</th>
                                <th>Komentar</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $feedback->order->order_number }}</td>
                                    <td>{{ $feedback->rating }}</td>
                                    <td>{{ $feedback->komentar }}</td>
                                    <td>{{ $feedback->created_at->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
