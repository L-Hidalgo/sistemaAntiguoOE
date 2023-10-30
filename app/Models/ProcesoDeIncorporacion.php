<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcesoDeIncorporacion extends Model
{
    protected $fillable = [
        'id',
        'propuestos', 
        'estado', 
        'remitente', 
        'fechaAccion', 
        'responsable', 
        'informeCuadro',
        'fechaInformeCuadro',
        'hpHr',
        'sippase',
        'idioma',
        'fechaMovimiento',
        'nombreMovimiento',
        'itemOrigen',
        'cargoOrigen',
        'memorandum',
        'RA',
        'fechaMemorialRap',
        'SAYRI'
    ];

    public function personal()
    {
        return $this->hasOne(Personal::class);
    }
    
    public function puesto()
    {
        return $this->hasOne(Puesto::class);
    }
    
}
