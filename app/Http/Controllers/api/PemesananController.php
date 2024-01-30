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
            ->where('users.id_google', '=', $idGoogle) // Menambah kondisi where
            ->select(
                'pemesanan.*',
                'layanan.nama_layanan as nama_layanan',
                'layanan.gambar_layanan as gambar_layanan',
                'layanan.harga as harga',
                'layanan.deskripsi as deskripsi',
                'users.nama_user as nama_user'
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
                'metode_pembayaran' => 'required', // Menambahkan aturan in:COD
                'bukti_pembayaran' => ($request->input('metode_pembayaran') == 'COD') ? '' : 'required|image|mimes:jpeg,png,jpg,pdf,svg',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $imageName = null;
            if ($request->input('metode_pembayaran') != 'COD') {
                // Jika metode pembayaran bukan COD, maka validasi gambar
                $imageFile = $request->file('bukti_pembayaran');
                $imageName = time() . '_' . uniqid() . '_' . $imageFile->getClientOriginalName();

                // Simpan gambar ke sistem file dengan nama unik
                // Simpan gambar ke direktori public dengan nama unik
                $imagePath = $imageFile->move(public_path('bukti_pembayaran'), $imageName);
            }

            // Simpan data pemesanan beserta nama file gambar
            Pemesanan::create([
                'id_layanan' => $request->input('id_layanan'),
                'id_user' => $request->input('id_user'),
                'id_google' => $request->input('id_google'),
                'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
                'waktu_pemesanan' => $request->input('waktu_pemesanan'),
                'status_pemesanan' => $request->input('status_pemesanan'),
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'bukti_pembayaran' => $imageName, // Simpan nama file
            ]);

            $response = [
                'Success' => 'New Pemesanan Created',
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
