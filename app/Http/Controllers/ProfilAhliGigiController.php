<?php

namespace App\Http\Controllers;

use App\Models\ProfilAhliGigi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilAhliGigiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();
        $user = User::where('users.id_user', auth()->user()->id_user)
            ->leftJoin('dokter', 'users.id_user', '=', 'dokter.id_user')
            ->select('users.*', 'dokter.*')
            ->first();

        view()->share('user', $user);
        return view('Profil.index', compact('user'));
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
    public function show(ProfilAhliGigi $profilAhliGigi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilAhliGigi $profilAhliGigi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfilAhliGigi $profilAhliGigi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilAhliGigi $profilAhliGigi)
    {
        //
    }
}
