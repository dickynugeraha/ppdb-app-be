<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    use HasFactory;
    protected $fillable = ["id","nisn", "semester_2", "semester_3", "semester_4", "semester_5", "semester_6",
    "nilai_uas", "transkrip_nilai", "created_at", "updated_at"];
}
