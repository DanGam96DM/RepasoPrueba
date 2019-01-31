<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Persona;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaFormRequest;
use DB;
use DataTables;
class PersonaController extends Controller
{
    public function __construct(){
        
    }
    public function index(){
        return view('persona.index');
    }
    public function personaDatos(){
        $personas=DB::table('tbl_persona');
        return DataTables::of($personas)->make(true);
    }
    public function create(){
        $tipo=DB::table('tbl_tipopersona')->get();
        return view('persona.create', ['tipo'=>$tipo]);
    }
    public function store(PersonaFormRequest $request){
        $persona= new Persona();
        $persona->nombrePersona=$request->get('nombrePersona');
        $persona->dpiPersona=$request->get('dpiPersona');
        $persona->direccionPersona=$request->get('direccionPersona');
        $persona->emailPersona=$request->get('emailPersona');
        $persona->telefonoPersona=$request->get('telefonoPersona');
        $persona->idTipo=$request->get('idTipo');
        $persona->save();
        return Redirect::to('persona');
    }
    public function edit($id){
        $persona=Persona::findOrFail($id);
        $tipo=DB::table('tbl_tipopersona')->get();
        return view('persona.edit', ['persona'=>$persona, 'tipo'=>$tipo]);
    }
    public function update(PersonaFormRequest $request, $id){
        $persona=Persona::findOrFail($id);
        $persona->nombrePersona=$request->get('nombrePersona');
        $persona->dpiPersona=$request->get('dpiPersona');
        $persona->direccionPersona=$request->get('direccionPersona');
        $persona->emailPersona=$request->get('emailPersona');
        $persona->telefonoPersona=$request->get('telefonoPersona');
        $persona->idTipo=$request->get('idTipo');
        $persona->update();
        return Redirect::to('persona');
    }
    public function show($id){
        $persona=Persona::findOrFail($id);
        return view('persona.show',['persona'=>$persona]);
    }
    public function destroy($id){

    }
}
