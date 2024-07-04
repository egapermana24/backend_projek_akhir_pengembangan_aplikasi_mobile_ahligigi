<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan idGoogle dari request
        $idGoogle = $request->input('idGoogle');

        $pemesanan = DB::table('pemesanan')
            ->join('layanan', 'pemesanan.id_layanan', '=', 'layanan.id_layanan')
            ->join('users', 'pemesanan.id_user', '=', 'users.id_user')
            ->leftJoin('dokter', 'pemesanan.id_dokter', '=', 'dokter.id_dokter')
            ->leftJoin('users as dokter_user', 'dokter.id_user', '=', 'dokter_user.id_user')
            ->where('users.id_google', '=', $idGoogle) // Menambah kondisi where
            ->select(
                'pemesanan.*',
                'layanan.nama_layanan as nama_layanan',
                'layanan.gambar_layanan as gambar_layanan',
                'layanan.harga as harga',
                'layanan.deskripsi as deskripsi',
                'users.nama_user as nama_user',
                'dokter_user.nama_user as nama_dokter',
            )
            ->get();

        $pemesanan->transform(function ($item, $key) {
            $item->lokasi_gambar = asset("resources/assets/images/{$item->gambar_layanan}");
            return $item;
        });

        return response()->json($pemesanan, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_layanan' => 'required',
                'id_user' => 'required',
                'id_google' => 'required',
                'tanggal_pemesanan' => 'required',
                'waktu_pemesanan' => 'required',
                'status_pemesanan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Cek apakah kombinasi id_layanan, tanggal_pemesanan, dan waktu_pemesanan sudah ada
            $exists = Pemesanan::where('id_layanan', $request->input('id_layanan'))
                ->where('tanggal_pemesanan', $request->input('tanggal_pemesanan'))
                ->where('waktu_pemesanan', $request->input('waktu_pemesanan'))
                ->exists();

            if ($exists) {
                return response()->json(['error' => 'Pemesanan dengan layanan, tanggal, dan waktu yang sama sudah ada.'], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Simpan data pemesanan
            Pemesanan::create([
                'id_layanan' => $request->input('id_layanan'),
                'id_user' => $request->input('id_user'),
                'id_google' => $request->input('id_google'),
                'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
                'waktu_pemesanan' => $request->input('waktu_pemesanan'),
                'status_pemesanan' => $request->input('status_pemesanan'),
            ]);

            $response = [
                'success' => 'New Pemesanan Created',
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            $error = [
                'error' => $e->getMessage(),
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
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
