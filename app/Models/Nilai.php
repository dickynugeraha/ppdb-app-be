<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Nilai extends Model
{
    use HasFactory, Notifiable, Uuids;
    protected $fillable = ["id", "nisn", "parameter_id", "nama_parameter", "nilai"];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, "nisn");
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
