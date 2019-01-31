<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalleingreso extends Model
{
    protected $table='tbl_detalleingreso';
    protected $primaryKey='idDetalleIngreso';
    public $timestamps=false;
    protected $fillable=[
        'idProducto',
        'idIngreso',
        'cantidadIngreso',
        'preciocompraIngreso',
        'precioventaIngreso'
    ];
}
