@extends('layouts.app_modern', ['title' => 'Edit Order'])  
  
@section('content')  
<div class="card">  
    <div class="card-header">EDIT ORDER</div>  
    <div class="card-body">  
        <form action="/admin/order/{{ $order->id_order }}" method="POST">  
            @csrf  
            @method('PUT')  
  
            <div class="form-group mt-3">  
                <label for="id_pengguna">Pengguna</label>  
                <select name="id_pengguna" class="form-control">  
                    @foreach ($listPengguna as $pengguna)  
                    <option value="{{ $pengguna->id_pengguna }}" @selected($order->id_pengguna == $pengguna->id_pengguna)>{{ $pengguna->nama }}</option>  
                    @endforeach  
                </select>  
                <span class="text-danger">{{ $errors->first('id_pengguna') }}</span>  
            </div>  
  
            <div class="form-group mt-3">  
                <label for="id_package">Paket</label>  
                <select name="id_package" class="form-control">  
                    @foreach ($listPackage as $package)  
                    <option value="{{ $package->id_package }}" @selected($order->id_package == $package->id_package)>{{ $package->nama_paket }}</option>  
                    @endforeach  
                </select>  
                <span class="text-danger">{{ $errors->first('id_package') }}</span>  
            </div>  
  
            <div class="form-group mt-3">  
                <label for="berat_kg">Berat (Kg)</label>  
                <input type="number" name="berat_kg" class="form-control" value="{{ $order->berat_kg }}" step="0.1" min="0">  
                <span class="text-danger">{{ $errors->first('berat_kg') }}</span>  
            </div>  
  
            <div class="form-group mt-3">  
                <label for="tgl_order">Tanggal Order</label>  
                <input type="date" name="tgl_order" class="form-control" value="{{ $order->tgl_order }}">  
                <span class="text-danger">{{ $errors->first('tgl_order') }}</span>  
            </div>  
  
            <div class="form-group mt-3">  
                <label for="waktu_pengambilan">Waktu Pengambilan</label>  
                <input type="datetime-local" name="waktu_pengambilan" class="form-control" value="{{ $order->waktu_pengambilan }}">  
                <span class="text-danger">{{ $errors->first('waktu_pengambilan') }}</span>  
            </div>  
  
            <div class="form-group mt-3">  
                <label for="waktu_pengantaran">Waktu Pengantaran</label>  
                <input type="datetime-local" name="waktu_pengantaran" class="form-control" value="{{ $order->waktu_pengantaran }}">  
                <span class="text-danger">{{ $errors->first('waktu_pengantaran') }}</span>  
            </div>  
  
            <div class="form-group mt-3">  
                <label for="status">Status</label>  
                <select name="status" class="form-control">  
                    <option value="Pending" @selected($order->status == 'Pending')>Pending</option>  
                    <option value="Selesai" @selected($order->status == 'Selesai')>Selesai</option>  
                    <option value="Dibatalkan" @selected($order->status == 'Dibatalkan')>Dibatalkan</option>  
                </select>  
                <span class="text-danger">{{ $errors->first('status') }}</span>  
            </div>  
  
            <button type="submit" class="btn btn-primary mt-3">Update</button>  
        </form>  
    </div>  
</div>  
@endsection  
