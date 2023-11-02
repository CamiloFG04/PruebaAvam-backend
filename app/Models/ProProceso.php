<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProProceso extends Model
{
    use HasFactory;

    protected $primaryKey = 'PRO_ID';

    protected $fillable = [
        'PRO_NOMBRE',
        'PRO_PREFIJO'
    ];

    public function documentos(){
        return $this->hasMany(DocDocumento::class);
    }
}
