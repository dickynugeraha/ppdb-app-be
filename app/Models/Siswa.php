<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $primaryKey = 'nisn';
    public $incrementing = false;
    protected $fillable = [
        "nisn",
        "asal_sekolah",
        "nama",
        "email",
        "password",
        "alamat",
        "no_hp_ortu",
        "jenis_kelamin",
        "foto_akte",
        "foto_ijazah",
        "foto_kk",
        "foto_ktp_ortu",
    ];

    protected $hidden = ["password", 'remember_token'];
}
