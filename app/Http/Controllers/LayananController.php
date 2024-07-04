<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data dari database lalu tampilakan di view Pelayanan.index
        $layanan = Layanan::all();
        return view('Pelayanan.index', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'gambar_layanan' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);
        //mengambil data file yang diupload
        //menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar_layanan');

        $gambar_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload

        $tujuan_upload = 'resources/assets/images';
        $file->move($tujuan_upload, $gambar_file);

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'gambar_layanan' => $gambar_file,
            'durasi' => $request->durasi,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,

        ]);
        return redirect()->route('pelayanan.index')
            ->with('success', 'Data Berhasil Ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show($layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($layanan)
    {
        $layanan = Layanan::find($layanan);
        return view('Pelayanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            // Tidak mewajibkan gambar di sini, karena gambar bisa tetap sama
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_layanan')) {
            // Mengunggah gambar baru
            $file = $request->file('gambar_layanan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $tujuan_upload = 'resources/assets/images';
            $file->move($tujuan_upload, $fileName);
            $data['gambar_layanan'] = $tujuan_upload . '/' . $fileName;
        } else {
            // Menggunakan gambar lama
            $data['gambar_layanan_old'] = $layanan->gambar_layanan;
        }

        $layanan->update($data);

        return redirect()->route('pelayanan.index')->with('success', 'Data Berhasil Diubah.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        // $layanan->delete();
        // return redirect()->route('layanans.index');
        File::delete('data_file/' . $layanan->gambar_file);

        // menghapus data motor
        $layanan->delete();
        return redirect()->route('pelayanan.index')
            ->with_('success', 'Data Berhasil Dihapus');
    }
}
