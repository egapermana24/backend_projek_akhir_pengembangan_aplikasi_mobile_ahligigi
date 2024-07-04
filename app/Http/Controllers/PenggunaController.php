<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil datanya dari tabel users, pengunjung, dan dokter
        // lalu tampilkan di view Pengguna.index
        $pengguna = User::all();
        return view('User.index', compact('pengguna'));
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
        // Validasi input
        $validatedData = $request->validate([
            'nama_user' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required|string|in:admin,resepsionis,dokter',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'foto_user' => 'image|mimes:jpeg,png,jpg,gif' // optional, jika tidak wajib dihapus
        ]);

        // Handle file upload jika ada
        if ($request->hasFile('foto_user')) {
            $file = $request->file('foto_user');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke dalam direktori yang diinginkan
            $file->move(public_path('resources/assets/images'), $fileName);

            // Tambahkan path file ke data yang divalidasi
            $validatedData['foto_user'] = 'resources/assets/images/' . $fileName;
        }

        // Simpan data ke database atau lakukan operasi lainnya
        // Misalnya, jika menggunakan Eloquent untuk model User:
        $user = new User();
        $user->nama_user = $validatedData['nama_user'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        $user->foto_user = $validatedData['foto_user'] ?? null; // jika foto tidak diupload, set null
        $user->save();

        // Redirect atau kembalikan respons sesuai kebutuhan aplikasi Anda
        return redirect('/user')->with('success', 'Data pengguna berhasil ditambahkan!');
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
        $user = User::findOrFail($id);
        return view('User.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Validasi input
        $validatedData = $request->validate([
            'nama_user' => 'required|string|max:255',
            'email' => 'required|email', // tambahkan id agar email yang sama bisa digunakan untuk pengguna lain
            'password' => 'nullable',
            'role' => 'required|string|in:admin,resepsionis,dokter',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'foto_user' => 'image|mimes:jpeg,png,jpg,gif' // optional, jika tidak wajib dihapus
        ]);

        // Ambil data user yang akan diupdate
        $user = User::findOrFail($id);

        // Handle file upload jika ada
        if ($request->hasFile('foto_user')) {
            $file = $request->file('foto_user');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke dalam direktori yang diinginkan
            $file->move(public_path('resources/assets/images'), $fileName);

            // Hapus foto lama jika ada
            if ($user->foto_user) {
                Storage::delete($user->foto_user);
            }

            // Update path foto baru
            $validatedData['foto_user'] = $fileName;
        }

        // Update data pengguna
        $user->nama_user = $validatedData['nama_user'];
        $user->email = $validatedData['email'];
        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->role = $validatedData['role'];
        $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        $user->foto_user = $validatedData['foto_user'] ?? $user->foto_user; // jika foto tidak diupload, tetapkan foto lama
        $user->save();

        // Redirect atau kembalikan respons sesuai kebutuhan aplikasi Anda
        return redirect('/user')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Ambil data user yang akan dihapus
        $user = User::findOrFail($id);

        // Hapus foto jika ada
        if ($user->foto_user) {
            Storage::delete($user->foto_user);
        }

        // Hapus data user
        $user->delete();

        // Redirect atau kembalikan respons sesuai kebutuhan aplikasi Anda
        return redirect('/user')->with('success', 'Data pengguna berhasil dihapus!');
    }
}
