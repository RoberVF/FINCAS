<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'dimensiones', 'num_parras', 'terreno', 'ubicacion', 'user_id'];

    public function producciones(){
        return $this->hasMany(Produccion::class);
    }

    public function riegos(){
        return $this->hasMany(Riego::class);
    }
}
