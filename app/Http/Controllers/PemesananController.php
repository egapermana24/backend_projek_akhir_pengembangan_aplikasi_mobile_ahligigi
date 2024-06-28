<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data dari database lalu tampilakan di view Pemesanan.index
        $pemesan = Pemesanan::join('layanan', 'pemesanan.id_layanan', '=', 'layanan.id_layanan')
            ->join('users', 'pemesanan.id_user', '=', 'users.id_user')
            ->select(
                'pemesanan.*',
                'layanan.nama_layanan as nama_layanan',
                'layanan.gambar_layanan as gambar_layanan',
                'layanan.harga as harga_layanan',
                'layanan.deskripsi as deskripsi_layanan',
                'users.nama_user',
                'users.foto_user'
            )
            ->get();

        return view('Pemesanan.index', compact('pemesan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        $ubah_status = Pemesanan::find($pemesanan);
        return view('Pemesanan.index', compact('ubah_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $validated = $request->validate([
            'status_pemesanan' => 'required|string',
            // Tambahkan validasi lainnya jika diperlukan
        ]);

        // Temukan pemesanan berdasarkan ID dan update statusnya
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status_pemesanan = $request->status_pemesanan;
        $pemesanan->save();

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
