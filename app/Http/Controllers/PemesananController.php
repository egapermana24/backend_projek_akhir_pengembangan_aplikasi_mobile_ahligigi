<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
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
            ->join('users as pemesanan_user', 'pemesanan.id_user', '=', 'pemesanan_user.id_user')
            ->leftJoin('dokter', 'pemesanan.id_dokter', '=', 'dokter.id_dokter')
            ->leftJoin('users as dokter_user', 'dokter.id_user', '=', 'dokter_user.id_user')
            ->select(
                'pemesanan.*',
                'layanan.nama_layanan as nama_layanan',
                'layanan.gambar_layanan as gambar_layanan',
                'layanan.harga as harga_layanan',
                'layanan.deskripsi as deskripsi_layanan',
                'pemesanan_user.nama_user as nama_user',
                'dokter_user.nama_user as nama_dokter',
                'pemesanan_user.foto_user'
            )
            ->get();

        $dokter = Dokter::join('users', 'dokter.id_user', '=', 'users.id_user')
            ->select(
                'dokter.*',
                'users.nama_user',
            )
            ->get();

        return view('Pemesanan.index', compact('pemesan', 'dokter'));

        // return view('Pemesanan.index', compact('pemesan'));
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
        // // Validasi input jika diperlukan
        // $validated = $request->validate([
        //     'status_pemesanan' => 'sometimes|string',
        //     'id_dokter' => 'sometimes|integer',
        //     // Tambahkan validasi lainnya jika diperlukan
        // ]);

        // Temukan pemesanan berdasarkan ID dan update statusnya
        if(isset($request->status_pemesanan)){
            $pemesanan = Pemesanan::findOrFail($id);
            $pemesanan->status_pemesanan = $request->status_pemesanan;
            $pemesanan->save();
        }
        if(isset($request->id_dokter)){
            $pemesanan = Pemesanan::findOrFail($id);
            $pemesanan->id_dokter = $request->id_dokter;
            $pemesanan->save();
        }
        // $pemesanan = Pemesanan::findOrFail($id);
        // $pemesanan->status_pemesanan = $request->status_pemesanan;
        // $pemesanan->id_dokter = $request->id_dokter;
        // $pemesanan->save();

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
