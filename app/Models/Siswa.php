<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = ["nisn", "nama", "alamat", "no_hp_ortu", "jenis_kelamin", 
    "foto_akte", "foto_ijazah", "foto_kk", "foto_ktp_ortu", "sekolah_id", "created_at", "updated_at"];

}
