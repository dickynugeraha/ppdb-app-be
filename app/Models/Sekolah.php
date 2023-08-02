<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sekolah extends Model
{
    use HasFactory, Notifiable, Uuids;

    protected $fillable = [
        "id",
        "nama",
        "deskripsi",
        "foto_logo",
        "foto_identitas",
        "foto_alur_pendaftaran",
        "pendaftaran_buka",
        "pendaftaran_tutup",
        "pengumuman_seleksi",
    ];
    use HasFactory;
}
