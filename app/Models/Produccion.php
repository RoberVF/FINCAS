<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'cantidad', 'descripcion', 'finca_id'];

    public function finca(){
        return $this->belongsTo(Finca::class);
    }
}
