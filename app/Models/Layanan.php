<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $primaryKey = 'id_layanan';
    protected $fillable = ['nama_layanan', 'gambar_layanan', 'harga', 'durasi', 'deskripsi', 'created_at', 'updated_at'];
}
