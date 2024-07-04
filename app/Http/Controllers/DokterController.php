<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokter = Dokter::join('users', 'dokter.id_user', '=', 'users.id_user')
            ->select('dokter.*', 'users.nama_user', 'users.email', 'users.foto_user', 'users.jenis_kelamin')
            ->get();
        return view('Dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data user dengan role dokter yang belum ada di tabel dokter
        $users = User::where('role', 'dokter')->whereDoesntHave('dokter')->get();

        return view('Dokter.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'pengalaman' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        // Simpan data dokter
        Dokter::create($validatedData);

        // Redirect atau kembalikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan!');
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
        // Ambil data dokter berdasarkan $id
        $dokter = Dokter::findOrFail($id);

        // Ambil data user dengan role dokter
        $users = User::where('role', 'dokter')->get();

        return view('Dokter.edit', compact('dokter', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'pengalaman' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        // Ambil data dokter berdasarkan $id
        $dokter = Dokter::findOrFail($id);

        // Update data dokter
        $dokter->update($validatedData);

        // Redirect atau kembalikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data dokter berdasarkan $id
        Dokter::destroy($id);

        // Redirect atau kembalikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus!');
    }
}
