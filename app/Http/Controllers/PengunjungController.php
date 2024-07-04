<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pemesanan;
use App\Models\Pengunjung;
use App\Models\User;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengunjung = Pengunjung::join('users', 'pengunjung.id_google', '=', 'users.id_google')
            ->join('pemesanan', 'pengunjung.id_google', '=', 'pemesanan.id_google')
            ->leftJoin('layanan', 'pemesanan.id_layanan', '=', 'layanan.id_layanan')
            ->select(
                'pengunjung.*',
                'users.nama_user',
                'users.email',
                'users.foto_user',
                'users.jenis_kelamin',
                'pemesanan.*',
                'layanan.nama_layanan',
            )
            ->get();
        $layanan = Layanan::all();

        return view('Pengunjung.index', compact('pengunjung', 'layanan'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Join tabel users, pengunjung, dan pemesanan berdasarkan id_google
        $pengunjung = Pengunjung::join('users', 'pengunjung.id_google', '=', 'users.id_google')
            ->join('pemesanan', 'pengunjung.id_google', '=', 'pemesanan.id_google')
            ->join('pemesanan as pemesanan_user', 'users.id_google', '=', 'pemesanan.id_google')
            ->select('pengunjung.*', 'users.nama_user', 'users.jenis_kelamin', 'pemesanan_user.hasil_analisa', 'pemesanan.saran_layanan')
            ->where('pengunjung.id_pengunjung', $id)
            ->firstOrFail();

        return view('pengunjung.edit', compact('pengunjung'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_user' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'no_telepon' => 'required|string|max:15',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'hasil_analisa' => 'required|string',
            'saran_layanan' => 'required|string',
        ]);

        // Ambil data pengunjung berdasarkan id_google
        $pengunjung = Pengunjung::where('id_google', $id)->firstOrFail();
        $user = User::where('id_google', $id)->firstOrFail();
        $pemesanan = Pemesanan::where('id_google', $id)->firstOrFail();

        // Update data di tabel users
        $user->update([
            'nama_user' => $validatedData['nama_user'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
        ]);

        // Update data di tabel pengunjung
        $pengunjung->update([
            'no_telepon' => $validatedData['no_telepon'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'alamat' => $validatedData['alamat'],
        ]);

        // Update data di tabel pemesanan
        $pemesanan->update([
            'hasil_analisa' => $validatedData['hasil_analisa'],
            'saran_layanan' => $validatedData['saran_layanan'],
        ]);

        // Redirect atau kembalikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('pengunjung.index')->with('success', 'Data pengunjung berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data pengunjung berdasarkan id_google
        Pengunjung::where('id_google', $id)->delete();

        // Redirect atau kembalikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('pengunjung.index')->with('success', 'Data pengunjung berhasil dihapus!');
    }
}
