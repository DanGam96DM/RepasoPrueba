<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='tbl_producto';
    protected $primaryKey='idProducto';
    public $timestamps=false;
    protected $fillable=[
        'codigoProducto',
        'nombreProducto',
        'stockProducto',
        'descripcionProducto',
        'estadoProducto',
        'idCategoria'
    ];
}
