<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Parameter extends Model
{
    use HasFactory, Notifiable, Uuids;

    protected $table = 'parameters';
    protected $fillable = ["id", "nama", "sifat",];

    public function bobot()
    {
        return $this->hasOne(Bobot::class);
    }

    public function sub_bobot()
    {
        return $this->hasMany(SubBobot::class);
    }
}
