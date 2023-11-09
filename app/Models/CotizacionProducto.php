<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionProducto extends Model
{
    use HasFactory;

    protected $table = 'cotizacion_producto';


    protected $fillable = [
        'cotizacion_id',
        'producto_id',
        'cantidad',
    ];

    public function cotizacion(){
        return $this->belongsToMany(Cotizacion::class);
    }
    public function producto(){
        return $this->belongsToMany(Producto::class);
    }
}
