<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='tbl_categoria';
    protected $primaryKey='idCategoria';
    public $timestamps=false;
    protected $fillable=[
        'nombreCategoria',
        'descripcionCategoria',
        'condicionCategoria'
    ];
}
