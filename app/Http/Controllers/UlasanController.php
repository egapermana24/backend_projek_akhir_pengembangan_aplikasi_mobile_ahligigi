<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // join dengan tabel layanan dan user, untuk layanan dihubungkan dengan id_layanan
        // dan user dihubungkan dengan id_user
        $ulasan = Ulasan::join('layanan', 'ulasan.id_layanan', '=', 'layanan.id_layanan')
            ->join('users', 'ulasan.id_user', '=', 'users.id_user')
            ->select(
                'ulasan.*',
                'layanan.nama_layanan',
                'users.nama_user',
            )
            ->get();

        return view('Ulasan.index', compact('ulasan'));
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
    public function show(Ulasan $ulasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        //
    }
}
