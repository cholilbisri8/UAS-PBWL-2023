<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Golongan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PelangganController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Pelanggan::all();
        return view('pelanggan.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gol = Golongan::all();
        $use = User::all();
        return view('pelanggan.create', compact('gol','use'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pel_id_gol' => 'required|exists:tb_golongan,gol_id',
            'pel_no' => 'required|unique:tb_pelanggan',
            'pel_nama' => 'required',
            'pel_alamat' => 'required',
            'pel_hp' => 'required',
            'pel_ktp' => 'required|unique:tb_pelanggan',
            'pel_seri' => 'required|unique:tb_pelanggan',
            'pel_meteran' => 'required|unique:tb_pelanggan',
            'pel_aktif' => 'required|in:Y,N',
            'pel_id_user' => 'required|exists:users,id'
        ],
        [
            'pel_id_gol.required' => 'ID PENGIRIMAN WAJIB DI ISI',
            'pel_no.required' => 'KODE WAJIB DI ISI',
            'pel_no.unique' => 'KODE SUDAH ADA',
            'pel_nama.required' => 'NAMA WAJIB DI ISI',
            'pel_alamat.required' => 'ALAMAT WAJIB DI ISI',
            'pel_hp.required' => 'KODE POS WAJIB DI ISI',
            'pel_ktp.required' => 'NO HP WAJIB DI ISI',
            'pel_seri.required' => 'NAMA PENERIMA WAJIB DI ISI',
            'pel_meteran.required' => 'NO METERAN WAJIB DI ISI',
            'pel_ktp.unique' => 'NO HP SUDAH ADA',
            'pel_seri.unique' => 'NAMA PENERIMA SUDAH ADA',
            'pel_meteran.unique' => 'NO METERAN SUDAH ADA',
            'pel_aktif.required' => 'KODE POS WAJIB DI ISI',
            'pel_id_user.required' => 'ID STAFF WAJIB DI ISI'
        ]);

        Pelanggan::create([
            'pel_id_gol' => $request->pel_id_gol,
            'pel_no' => $request->pel_no,
            'pel_nama' => $request->pel_nama,
            'pel_alamat' => $request->pel_alamat,
            'pel_hp' => $request->pel_hp,
            'pel_ktp' => $request->pel_ktp,
            'pel_seri' => $request->pel_seri,
            'pel_meteran' => $request->pel_meteran,
            'pel_aktif' => $request->pel_aktif,
            'pel_id_user' => $request->pel_id_user
        ]);

        return redirect('pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gol = Golongan::all();
        $use = User::all();
        $row = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('row','gol','use'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pel_id_gol' => 'required|exists:tb_golongan,gol_id',
            'pel_no' => 'required|unique:tb_pelanggan',
            'pel_nama' => 'required',
            'pel_alamat' => 'required',
            'pel_hp' => 'required',
            'pel_ktp' => 'required|unique:tb_pelanggan',
            'pel_seri' => 'required|unique:tb_pelanggan',
            'pel_meteran' => 'required|unique:tb_pelanggan',
            'pel_aktif' => 'required',
            'pel_id_user' => 'required|exists:users,id'
        ],
        [
            'pel_id_gol.required' => 'ID PENGIRIMAN WAJIB DI ISI',
            'pel_no.required' => 'KODE WAJIB DI ISI',
            'pel_no.unique' => 'KODE SUDAH ADA',
            'pel_nama.required' => 'NAMA WAJIB DI ISI',
            'pel_alamat.required' => 'ALAMAT WAJIB DI ISI',
            'pel_hp.required' => 'KODE POS WAJIB DI ISI',
            'pel_ktp.required' => 'NO HP WAJIB DI ISI',
            'pel_seri.required' => 'NAMA PENERIMA WAJIB DI ISI',
            'pel_meteran.required' => 'NO METERAN WAJIB DI ISI',
            'pel_ktp.unique' => 'NO HP SUDAH ADA',
            'pel_seri.unique' => 'NAMA PENERIMA SUDAH ADA',
            'pel_meteran.unique' => 'NO METERAN SUDAH ADA',
            'pel_aktif.required' => 'KODE POS WAJIB DI ISI',
            'pel_id_user.required' => 'ID STAFF WAJIB DI ISI'
        ]);

        $row = Pelanggan::findOrFail($id);
        $row->update([
            'pel_id_gol' => $request->pel_id_gol,
            'pel_no' => $request->pel_no,
            'pel_nama' => $request->pel_nama,
            'pel_alamat' => $request->pel_alamat,
            'pel_hp' => $request->pel_hp,
            'pel_ktp' => $request->pel_ktp,
            'pel_seri' => $request->pel_seri,
            'pel_meteran' => $request->pel_meteran,
            'pel_aktif' => $request->pel_aktif,
            'pel_id_user' => $request->pel_id_user
        ]);

        return redirect('pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Pelanggan::findOrFail($id);
        $row->delete();

        return redirect('pelanggan');
    }
}
