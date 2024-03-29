<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menggunakan Query Builder untuk join tabel
        $ulasans = DB::table('ulasan')
            ->join('layanan', 'ulasan.id_layanan', '=', 'layanan.id_layanan')
            ->join('users', 'ulasan.id_user', '=', 'users.id_user')
            ->select(
                'ulasan.*',
                'layanan.nama_layanan as nama_layanan',
                'layanan.gambar_layanan as gambar_layanan',
                'layanan.harga as harga',
                'layanan.deskripsi as deskripsi',
                'users.nama_user as nama_user'
            )
            ->get();

        $ulasans->transform(function ($item, $key) {
            $item->lokasi_gambar = asset("resources/assets/images/{$item->gambar_layanan}");
            return $item;
        });

        return response()->json($ulasans, 200);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
