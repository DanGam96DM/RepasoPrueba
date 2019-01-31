<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Producto;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductoFormRequest;
use DB;
use DataTables;
class ProductoController extends Controller
{
    public function __construct(){

    }
    public function index(){
        return view('producto.index');
    }
    public function productoDatos(){
        $producto=DB::table('tbl_producto as p')
        ->join('tbl_categoria as c', 'p.idCategoria', '=', 'c.idCategoria')
        ->select('p.idProducto', 'p.codigoProducto', 'p.nombreProducto', 'p.stockProducto', 'p.descripcionProducto', 'c.nombreCategoria')
        ->where('p.estadoProducto', '=', '1');
        return DataTables::of($producto)->make(true);
    }
    public function create(){
        $categoria=DB::table('tbl_categoria')->get();
        return view('producto.create', ['categoria'=>$categoria]);
    }
    public function store(ProductoFormRequest $request){
        $producto=new Producto();
        $producto->codigoProducto=$request->get('codigoProducto');
        $producto->nombreProducto=$request->get('nombreProducto');
        $producto->stockProducto=$request->get('stockProducto');
        $producto->descripcionProducto=$request->get('descripcionProducto');
        $producto->estadoProducto=1;
        $producto->idCategoria=$request->get('idCategoria');
        $producto->save();
        return Redirect::to('producto');
    }
    public function edit($id){
        $producto=Producto::findOrFail($id);
        $tipo=DB::table('tbl_categoria')->get();
        return view('producto.edit',['producto'=>$producto, 'tipo'=>$tipo]);
    }
    public function update(ProductoFormRequest $request, $id){
        $producto=Producto::findOrFail($id);
        $producto->codigoProducto=$request->get('codigoProducto');
        $producto->nombreProducto=$request->get('nombreProducto');
        $producto->stockProducto=$request->get('stockProducto');
        $producto->descripcionProducto=$request->get('descripcionProducto');
        $producto->idCategoria=$request->get('idCategoria');
        $producto->update();
        return Redirect::to('producto');
    }
    public function show($id){
        $producto=Producto::findOrFail($id);
        $producto->estadoProducto=0;
        $producto->update();
        return Redirect::to('producto');
    }
    public function destroy($id){

    }
}
