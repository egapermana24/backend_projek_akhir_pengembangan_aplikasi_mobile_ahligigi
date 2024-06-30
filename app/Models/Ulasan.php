<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';

    protected $primaryKey = 'id_ulasan';

    protected $fillable = [
        'id_layanan',
        'id_user',
        'nilai_ulasan',
        'komentar',
        'tanggal_ulasan',
    ];

    public $timestamps = true;

}
