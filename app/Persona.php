<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='tbl_persona';
    protected $primaryKey='idPersona';
    public $timestamps=false;
    protected $fillable=[
        'nombrePersona',
        'dpiPersona',
        'direccionPersona',
        'emailPersona',
        'telefonoPersona',
        'idTipo'
    ];
}
