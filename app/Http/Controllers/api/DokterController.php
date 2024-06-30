<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Mengambil data dari tabel user dan dokter dengan join
            $dokter = Dokter::join('users', 'dokter.id_user', '=', 'users.id_user')
                ->select('dokter.*', 'users.nama_user', 'users.foto_user')
                ->get();

            // Menambahkan path gambar ke setiap elemen koleksi $dokter
            $dokter->transform(function ($item, $key) {
                $item['lokasi_gambar'] = asset("resources/assets/images/{$item['foto_user']}");
                return $item;
            });

            return response()->json($dokter, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
