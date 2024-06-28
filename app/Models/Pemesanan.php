<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_layanan',
        'id_user',
        'id_google',
        'tanggal_pemesanan',
        'waktu_pemesanan',
        'status_pemesanan',
    ];
}
