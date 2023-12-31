<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = [
        'id',
        'denominacion',
        'objetivo',
        'item',
        'estado',
        'salario',
        'salarioLiteral',
        'departamento_id'
    ];

    public function personaPuesto(){
        return $this->hasMany(PersonaPuesto::class,'puesto_id', 'id');
    }

    public function procesoDeIncorporacion() {
        return $this->hasMany(ProcesoDeIncorporacion::class);
    }
    
    public function requisitosPuesto(){
        return $this->hasMany(RequisitosPuesto::class);
    }

    public function departamento() {
        return $this->belongsTo(Departamento::class);
    }
}
