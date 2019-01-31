<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table='tbl_ingreso';
    protected $primaryKey='idIngreso';
    public $timestamps=false;
    protected $fillable=[
        'tipocomprobanteIngreso',
        'seriecomprobanteIngreso',
        'numcomprobanteIngreso',
        'fechahoraIngreso',
        'impuestoIngreso',
        'idPersona',
        'idEstado'
    ];
}
