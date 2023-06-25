<?php

namespace App\Models;

// use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Admin extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = 'admins';
  protected $fillable = ["id", "username", "password"];

  protected $hidden = [
    'passcode', 'remember_token',
  ];

  public function getAuthPassword()
  {
    return $this->passcode;
  }
}
