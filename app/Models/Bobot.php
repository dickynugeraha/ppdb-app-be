<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ["id", "bobot", "parameter_id"];

    public function parameter(){
        return $this->belongsTo(Parameter::class);
    }
}
