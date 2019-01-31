<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use DB;
use DataTables;
class CategoriaController extends Controller
{
    public function __construct(){

    }
    public function index(){
        return view('categoria.index');
    }
    public function categoriaDatos(){
        $categorias=DB::table('tbl_categoria')
        ->where('condicionCategoria', '=', '1');
        return DataTables::of($categorias)->make(true);
    }
    public function create(){
        return view('categoria.create');
    }
    public function store(CategoriaFormRequest $request){
        $categoria= new Categoria();
        $categoria->nombreCategoria=$request->get('nombreCategoria');
        $categoria->descripcionCategoria=$request->get('descripcionCategoria');
        $categoria->condicionCategoria=1;
        $categoria->save();
        return Redirect::to('categoria');
    }
    public function edit($id){
        $categoria=Categoria::findOrFail($id);
        return view('categoria.edit', ['categoria'=>$categoria]);
    }
    public function update(CategoriaFormRequest $request, $id){
        $categoria=Categoria::findOrFail($id);
        $categoria->nombreCategoria=$request->get('nombreCategoria');
        $categoria->descripcionCategoria=$request->get('descripcionCategoria');
        $categoria->condicionCategoria=1;
        $categoria->update();
        return Redirect::to('categoria');
    }
    public function show($id){
        $categoria=Categoria::findOrFail($id);
        $categoria->condicionCategoria=0;
        $categoria->update();
        return Redirect::to('categoria');
    }
    public function destroy($id){
        $categoria=Categoria::findOrFail($id);
        $categoria->condicionCategoria=0;
        $categoria->update();
        return Redirect::to('categoria');
    }
}
