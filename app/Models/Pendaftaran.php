<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pendaftaran extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pendaftarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'nim',
        'prodi',
        'email',
        'semester',
        'no_telp',
        'cv',
        'divisi_1',
        'divisi_2',
        'jenis_kelamin',
        'jabatan',
        'jabatan_2',
        'status',
    ];
}
