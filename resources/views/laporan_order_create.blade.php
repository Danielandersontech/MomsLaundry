@extends('layouts.app_modern')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">LAPORAN ORDER</div>
                    <div class="card-body">
                        <form action="/laporan-order" method="GET" target="_blank">
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="tanggal_mulai">Tanggal Order Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tanggal_akhir">Tanggal Order Akhir</label>
                                    <input type="date" name="tanggal_akhir" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">-- Semua Status --</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Dibatalkan">Dibatalkan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="berat_min">Berat Minimal (kg)</label>
                                    <input type="number" step="0.01" name="berat_min" class="form-control" placeholder="Contoh: 1">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="berat_max">Berat Maksimal (kg)</label>
                                    <input type="number" step="0.01" name="berat_max" class="form-control" placeholder="Contoh: 10">
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
