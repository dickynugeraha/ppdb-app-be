<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiNonAkademik extends Model
{
    use HasFactory;
    protected $fillable = ["id","nisn", "jenis", "juara_id", "created_at", "updated_at"];

}
