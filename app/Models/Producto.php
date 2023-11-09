<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'producto_id';

    protected $fillable = [
        'codigo',
        'nombre',
        'precio',
        'imagen',
        'activo',
        'created_by',
    ];

    public function cotizacionProducto(){
        return $this->belongsToMany(CotizacionProducto::class);
    }
}

