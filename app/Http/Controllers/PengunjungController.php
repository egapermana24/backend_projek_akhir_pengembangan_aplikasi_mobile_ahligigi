<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pengunjung;
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
    public function edit(string $id)
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
