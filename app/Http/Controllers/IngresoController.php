<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ingreso;
use App\Detalleingreso;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoFormRequest;
use DB;
use DataTables;
class IngresoController extends Controller
{
    public function __construct(){

    }
    public function index(){
        return view('ingreso.index');
    }
    public function ingresoDatos(){
        $ingresos=DB::table('tbl_ingreso as i')
        ->join('tbl_persona as p', 'i.idPersona', '=', 'p.idPersona')
        ->join('tbl_detalleingreso as d', 'i.idIngreso', '=', 'd.idIngreso')
        ->select('i.idIngreso', 'i.fechahoraIngreso', 'p.nombrePersona', 'i.tipocomprobanteIngreso', 'i.seriecomprobanteIngreso', 'i.numcomprobanteIngreso', 'i.impuestoIngreso', 
            'i.idEstado', DB::raw('sum(d.cantidadIngreso*preciocompraIngreso) as total'))
        ->groupBy('i.idIngreso', 'i.fechahoraIngreso', 'p.nombrePersona', 'i.tipocomprobanteIngreso', 'i.seriecomprobanteIngreso', 'i.numcomprobanteIngreso', 'i.impuestoIngreso', 'i.idEstado');
        return DataTables::of($ingresos)->make(true);
    }
    public function create(){
        $persona=DB::table('tbl_persona')->where('idTipo', '=', '2')->get();
        $producto=DB::table('tbl_producto')->where('estadoProducto', '=', '1')->get();
        return view('ingreso.create',['persona'=>$persona, 'producto'=>$producto]);
    }
    public function store(IngresoFormRequest $request){
        try{
            DB::beginTransaction();
            $ingreso=new Ingreso();
            $ingreso->idPersona=$request->get('idPersona');
            $ingreso->tipocomprobanteIngreso=$request->get('tipocomprobanteIngreso');
            $ingreso->seriecomprobanteIngreso=$request->get('seriecomprobanteIngreso');
            $ingreso->numcomprobanteIngreso=$request->get('numcomprobanteIngreso');
            $fechaActual=date('Y-m-d H:i:s');
            $ingreso->fechahoraIngreso=$fechaActual;
            $ingreso->impuestoIngreso=12;
            $ingreso->idEstado=1;
            $ingreso->save();

            $idProducto=$request->get('idProducto');
            $cantidadIngreso=$request->get('cantidadIngreso');
            $preciocompraIngreso=$request->get('preciocompraIngreso');
            $precioventaIngreso=$request->get('precioventaIngreso');

            $cont=0;
            while($cont < count($idProducto)){
                $detalle=new Detalleingreso();
                $detalle->idIngreso=$ingreso->idIngreso;
                $detalle->idProducto=$idProducto[$cont];
                $detalle->cantidadIngreso=$cantidadIngreso[$cont];
                $detalle->preciocompraIngreso=$preciocompraIngreso[$cont];
                $detalle->precioventaIngreso=$precioventaIngreso[$cont];
                $detalle->save();
                $cont=$cont+1;
            }

            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
        }
        return Redirect::to('ingreso');
    }
    public function show($id){
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->idEstado=1;
        $ingreso->update();
        return Redirect::to('ingreso');
    }
}
