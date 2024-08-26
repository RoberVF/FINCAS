<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = ['finca_id', 'cantidad', 'fecha', 'descripcion'];

    public function finca(){
        return $this->belongsTo(Finca::class);
    }
}
