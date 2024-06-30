<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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
        try {
            $validator = Validator::make($request->all(), [
                'id_layanan' => 'required',
                'id_user' => 'required',
                'nilai_ulasan' => 'required',
                'komentar' => 'required',
                'tanggal_ulasan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Periksa apakah ulasan untuk kombinasi id_layanan dan id_user sudah ada
            $existingUlasan = Ulasan::where('id_layanan', $request->input('id_layanan'))
                ->where('id_user', $request->input('id_user'))
                ->first();

            if ($existingUlasan) {
                return response()->json(['error' => 'User sudah mengulas layanan ini'], Response::HTTP_CONFLICT);
            }

            // Tambahkan nilai 'created_at' dengan tanggal saat ini jika belum ada
            $ulasanData = $request->all();
            $ulasanData['created_at'] = now();

            Ulasan::create($ulasanData);

            $response = [
                'Success' => 'New Ulasan Created',
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
        try {
            $ulasan = Ulasan::findOrFail($id);
            return response()->json([
                'data' => $ulasan
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Ulasan tidak ditemukan'
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan ulasan yang sesuai dengan id
            $ulasan = Ulasan::findOrFail($id);

            if (!$ulasan) {
                return response()->json(['error' => 'Ulasan tidak ditemukan'], Response::HTTP_NOT_FOUND);
            }

            // Validasi data yang diterima
            $validator = Validator::make($request->all(), [
                'nilai_ulasan' => 'required',
                'komentar' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors(),
                    'request_data' => $request->all() // Tambahkan data request untuk debugging
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Perbarui ulasan
            $ulasan->update($request->all());

            return response()->json(['success' => 'Ulasan berhasil diperbarui', 'data' => $ulasan], Response::HTTP_OK);
        } catch (\Exception $e) {
            $error = [
                'error' => $e->getMessage(),
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Temukan ulasan yang sesuai dengan id
            $ulasan = Ulasan::findOrFail($id);

            if (!$ulasan) {
                return response()->json(['error' => 'Ulasan tidak ditemukan'], Response::HTTP_NOT_FOUND);
            }

            // Hapus ulasan
            $ulasan->delete();

            return response()->json(['success' => 'Ulasan berhasil dihapus'], Response::HTTP_OK);
        } catch (\Exception $e) {
            $error = [
                'error' => $e->getMessage(),
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
