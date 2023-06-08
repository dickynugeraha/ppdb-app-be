<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ["id", "nama", "sifat"];

    public function bobot()
    {
        return $this->hasOne(Bobot::class);
    }

    public function sub_bobot()
    {
        return $this->hasMany(SubBobot::class);
    }
}
