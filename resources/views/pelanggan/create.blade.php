@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Pelanggan</h3>

        <form action="{{ url('/pelanggan') }}" method="POST">
             @csrf
            <div class="mb-2">
                <label>ID PENGIRIMAN</label>
                <select class="form-control select2" name="pel_id_gol" id="pel_id_gol" required>
                @foreach ($gol as $item)
                <option value="{{ $item->gol_id }}">{{ $item->gol_nama }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>KODE</label>
                <input type="text" class="form-control" name="pel_no">
            </div>
            <div class="mb-2">
                <label>NAMA PELANGGAN</label>
                <input type="text" class="form-control" name="pel_nama">
            </div>
            <div class="mb-2">
                <label>ALAMAT PELANGGAN</label>
                <textarea name="pel_alamat" id="" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-2">
                <label>KODE POS</label>
                <input type="text" class="form-control" name="pel_hp">
            </div>
            <div class="mb-2">
                <label>NO HP</label>
                <input type="text" class="form-control" name="pel_ktp">
            </div>
            <div class="mb-2">
                <label>NAMA PENERIMA</label>
                <input type="text" class="form-control" name="pel_seri">
            </div>
            <div class="mb-2">
                <label>NO PENGIRIMAN</label>
                <input type="text" class="form-control" name="pel_meteran">
            </div>
            <div class="mb-2">
                <label>STATUS</label>
                <select id="pel_aktif" class="form-control" name="pel_aktif" required>
                <option value="Y">AKTIF</option>
                <option value="N">TIDAK AKTIF</option></select>
            </div>
            <div class="mb-2">
                <label>ID STAFF</label>
                <select class="form-control select2" name="pel_id_user" id="pel_id_user" required>
                @foreach ($use as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-2">
                <input type="submit" value="SIMPAN">
            </div></form>
    </div>
@endsection