<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocDocumento extends Model
{
    use HasFactory;

    protected $primaryKey = 'DOC_ID';


    protected $fillable = [
        'DOC_NOMBRE',
        'DOC_CODIGO',
        'DOC_CONTENIDO',
        'DOC_ID_TIPO',
        'DOC_ID_PROCESO',
    ];

    public function tipo(){
        return $this->belongsTo(TipTipoDoc::class,'DOC_ID','TIP_ID');
    }

    public function proceso(){
        return $this->belongsTo(ProProceso::class,'DOC_ID','PRO_ID');
    }
}
