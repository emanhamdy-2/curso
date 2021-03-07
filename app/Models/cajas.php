<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cajas extends Model
{
  use HasFactory;
  protected $table='cajas';
  protected $fillable =['monto','compacte','compct','tipo','user_id'];
}
