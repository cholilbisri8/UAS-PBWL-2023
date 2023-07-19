@extends ('layouts.app')

@section('content')

<div class="container">

    <h3>DAFTAR PELANGGAN</h3>
    <a href="{{ url('pelanggan/create') }}">Tambah Data Pelanggan</a>
    <table class="table table-bordered">
        <tr>
            <td>NO</td>
            <td>ID PENGIRIMAN</td>
            <td>NAMA</td>
            <td>ALAMAT</td>
            <td>KODE POS</td>
            <td>NO HP</td>
            <td>NAMA PENERIMA</td>
            <td>NO PENGIRIMAN</td>
            <td>STATUS</td>
            <td>ID STAFF</td>
            <td>EDIT</td>
            <td>HAPUS</td>
        </tr>
        @foreach($rows as $row)
        <tr>
            <td>{{ $row->pel_id }}</td>
            <td>{{ $row->pel_id_gol }}</td>
            <td>{{ $row->pel_nama }}</td>
            <td>{{ $row->pel_alamat }}</td>
            <td>{{ $row->pel_hp }}</td>
            <td>{{ $row->pel_ktp }}</td>
            <td>{{ $row->pel_seri }}</td>
            <td>{{ $row->pel_meteran }}</td>
            <td>{{ $row->pel_aktif }}</td>
            <td>{{ $row->pel_id_user }}</td>
            <td><a href="{{ url('pelanggan/' . $row->pel_id . '/edit') }}">Edit</a></td>
            <td><form action="{{ url('pelanggan/' . $row->pel_id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button>Hapus</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection