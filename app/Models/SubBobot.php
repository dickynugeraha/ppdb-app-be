<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;

class SubBobot extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ["id", "keterangan", "parameter_id", "bobot"];

    public function parameter(){
        return $this->belongsTo(Parameter::class);
    }
}
