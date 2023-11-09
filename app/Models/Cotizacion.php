<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $primaryKey = 'cotizacion_id';
    protected $table = 'cotizaciones';

    protected $fillable = [
        'cliente_id',
        'valor',
        'fecha',
    ];

    public function cotizacionProducto(){
        return $this->belongsToMany(Producto::class,'cotizacion_producto','cotizacion_id','producto_id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
}
