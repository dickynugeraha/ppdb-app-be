<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bobot extends Model
{
    use HasFactory, Notifiable, Uuids;
    protected $fillable = ["id", "bobot", "parameter_id"];

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
