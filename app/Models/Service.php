<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable=['title','description','nrowsp', 'image'];

    const BORRADOR = 1;
    const PUBLICADO = 2;
}
