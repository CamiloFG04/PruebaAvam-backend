<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipTipoDoc extends Model
{
    use HasFactory;

    protected $primaryKey = 'TIP_ID';

    protected $fillable = [
        'TIP_NOMBRE',
        'TIP_PREFIJO'
    ];

    public function documentos(){
        return $this->hasMany(DocDocumento::class);
    }
}
