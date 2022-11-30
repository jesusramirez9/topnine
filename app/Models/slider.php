<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    const ACTIVO = 1;
    const INACTIVO = 0;

    protected $fillable = ['name','order','image','status'];
}
