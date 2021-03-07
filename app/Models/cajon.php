<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cajon extends Model
{
  use HasFactory;
  protected $table='cajones';
  protected $fillable=['description','status','tipo_id'];
}
