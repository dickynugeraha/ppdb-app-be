<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Prestasi extends Model
{
    use HasFactory, Notifiable, Uuids;

    protected $fillable = [
        "id",
        "nisn",
        "nilai_semester",
        "nilai_un",
        "nilai_uas",
        "prestasi_akademik",
        "prestasi_non_akademik",
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
