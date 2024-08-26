<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riego extends Model
{
    use HasFactory;

    protected $fillable = ['finca_id', 'fecha', 'cantidad', 'tiempo', 'descripcion'];

    public function finca(){
        return $this->belongsTo(Finca::class);
    }
}
