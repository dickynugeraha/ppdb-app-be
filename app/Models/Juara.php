<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juara extends Model
{
    use HasFactory;
    protected $fillable = ["id", "perangkat", "wilayah", "foto_sertifikat", "created_at", "updated_at"];
}
