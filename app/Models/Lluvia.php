<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lluvia extends Model
{
    use HasFactory;

    protected $fillable = ['ubicacion', 'cantidad', 'fecha'];
}
