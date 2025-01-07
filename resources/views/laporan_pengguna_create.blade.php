@extends('layouts.app_modern')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">LAPORAN PENGGUNA</div>
                    <div class="card-body">
                        <form action="/admin/laporan-pengguna" method="GET" target="_blank">
                            <div class="row mt-3">
                                <div class="form-group col-md-6">
                                    <label for="tanggal_mulai">Tanggal Daftar Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tanggal_selesai">Tanggal Daftar Akhir</label>
                                    <input type="date" name="tanggal_selesai" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
