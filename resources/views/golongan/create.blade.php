@extends('layouts.app')

@section('content')
    <div class="container">
        <h3> Tambah Pengiriman</h3>

        <form action="{{ url('/golongan') }}" method="POST">
            @csrf 
            <div class="mb-2">
                <label>KODE</label>
                <input type="text" class="form-control" name="gol_kode">
            </div>
            <div class="mb-2">
                <label>NAMA PENGIRIMAN</label>
                <input type="text" class="form-control" name="gol_nama">
            </div>
            <div class="mb-2">
                <input type="submit" value="SIMPAN">
            </div></form>
    </div>
@endsection