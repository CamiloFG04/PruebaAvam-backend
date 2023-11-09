<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'cliente_id';

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
    ];

    public function cotizacion(){
        return $this->hasMany(Cotizacion::class);
    }
}
