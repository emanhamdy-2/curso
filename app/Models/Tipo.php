<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
  use HasFactory;
  protected $table='tipos';
  protected $fillable=['description'];
  // protected $rules=['description' => 'required|min:4'];

  // public function getCreatedAtAttribute()
  // {
  //   return $this->created_at->diffForHumans();
  // }

}
