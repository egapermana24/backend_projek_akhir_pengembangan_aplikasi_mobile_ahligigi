<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';

    protected $primaryKey = 'id_pengunjung';

    protected $fillable = [
        'id_google',
        'no_telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_google', 'id_google');
    }
}

