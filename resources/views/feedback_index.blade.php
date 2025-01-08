@extends('layouts.app_modern', ['title' => 'Data Feedback'])  
@section('content')  
    <div class="card">  
        <h5 class="card-header">Data Feedback</h5>  
        <div class="card-body">  
            <table class="table table-striped">  
                <thead>  
                    <tr>  
                        <th>NO</th>  
                        <th>Pengguna ID</th>  
                        <th>Order ID</th>  
                        <th>Rating</th>  
                        <th>Komentar</th>  
                        <th>AKSI</th>  
                    </tr>  
                </thead>  
                <tbody>  
                    @forelse ($feedbacks as $feedback)  
                        <tr>  
                            <td>{{ $loop->iteration }}</td>  
                            <td>{{ $feedback->pengguna ? $feedback->pengguna->nama : 'Pengguna tidak ditemukan' }}</td>  
                            <td>{{ $feedback->order ? $feedback->order->id_order : 'Order tidak ditemukan' }}</td>  
                            <td>{{ $feedback->rating }}</td>  
                            <td>{{ $feedback->komentar }}</td>  
                            <td>  
                                <form action="/admin/feedback/{{ $feedback->id_feedback }}" method="POST" class="d-inline">  
                                    @csrf  
                                    @method('delete')  
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>  
                                </form>  
                            </td>  
                        </tr>  
                    @empty  
                        <tr>  
                            <td colspan="6" class="text-center">Tidak ada data feedback.</td>  
                        </tr>  
                    @endforelse  
                </tbody>  
            </table>  
            {!! $feedbacks->links() !!}  
        </div>  
    </div>  
@endsection  
