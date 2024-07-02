<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Assuming you have a middleware or authentication logic that sets the current user
            // Retrieve the current user based on the provided id_google during login
            $user = User::where('id_google', $request->id_google)->first();

            if (!$user) {
                $response = [
                    'error' => 'User not found based on id_google',
                ];
                return response()->json($response, Response::HTTP_NOT_FOUND);
            }

            // Retrieve the id_user
            $id_user = $user->id_user;
            $id_google = $user->id_google;

            // Now you can use $id_user as needed in your response or further processing

            $response = [
                'Success' => 'User Found',
                'id_user' => $id_user,
                'id_google' => $id_google,
                // Include any other information you want to return
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            $error = [
                'error' => $e->getMessage(),
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            // Validasi data yang diterima
            $validator = Validator::make($request->all(), [
                'id_google' => 'required|unique:users,id_google',
                'nama_user' => 'required',
                'email' => 'required|unique:users,email',
                'role' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Membuat pengguna baru
            $user = User::create([
                'id_google' => $request->id_google,
                'nama_user' => $request->nama_user,
                'foto_user' => $request->foto_user,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            // Menambahkan id_google ke tabel pengunjung
            Pengunjung::create([
                'id_google' => $request->id_google,
            ]);

            $response = [
                'Success' => 'New User Created',
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $userWithPengunjung = User::join('pengunjung', 'users.id_google', '=', 'pengunjung.id_google')
                ->select('users.id_user', 'users.id_google', 'users.nama_user', 'users.foto_user', 'users.jenis_kelamin', 'pengunjung.no_telepon', 'pengunjung.tempat_lahir', 'pengunjung.tanggal_lahir', 'pengunjung.alamat')
                ->where('users.id_google', $id)
                ->firstOrFail();

            return response()->json([
                'data' => $userWithPengunjung
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'User tidak ditemukan'
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
            // Validasi data yang diterima
            $validator = Validator::make($request->all(), [
                'nama_user' => 'required|string|max:255',
                'foto_user' => 'sometimes|file|image|',
                'no_telepon' => 'required|string|max:15',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string|max:255',
                'jenis_kelamin' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Cari pengguna berdasarkan id_google
            $user = User::where('id_google', $id)->firstOrFail();

            // Cari pengunjung berdasarkan id_google
            $pengunjung = Pengunjung::where('id_google', $id)->firstOrFail();



            if ($request->hasFile('foto_user')) {
                // buat pengecekan dengan json apakah lewat sini tidak logikanya
                // Jika ada file gambar yang dikirim
                return response()->json([
                    'test' => 'Okei mengarah kesini',
                ]);
                $imageFile = $request->file('foto_user');
                $originalName = $imageFile->getClientOriginalName();
                $imageName = time() . '_' . uniqid() . '_' . str_replace(' ', '_', $originalName);
                // Simpan gambar ke direktori public dengan nama unik
                $imageFile->move(public_path('foto_user'), $imageName);
                $urlImage = url('foto_user/' . $imageName);

                $user->update([
                    'foto_user' => $urlImage,
                ]);
    

                // Hapus file gambar lama jika ada
                if ($pengunjung->foto_user) {
                    $oldImagePath = public_path('foto_user/' . $pengunjung->foto_user);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }


            // Perbarui data pengguna
            $user->update([
                'nama_user' => $request->input('nama_user'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
            ]);

            // Perbarui data pengunjung
            $pengunjung->update([
                'no_telepon' => $request->input('no_telepon'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'alamat' => $request->input('alamat'),
            ]);

            return response()->json([
                'Success' => 'User Updated',
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User or Pengunjung not found'], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
