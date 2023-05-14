<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Vacante;

class VacanteController extends Controller
{
    static function alta(Request $request){
            Vacante::alta($request->empresa_id,
            $request->titulo,
            $request->fecha_creacion,
            $request->requisitos,
            $request->detalles_trabajo,
            $request->salario,
            $request->informacion_adicional);
        }

        
    public function consulta_empresaid(Request $request){
        $empresa = Vacante::consulta_empresaid($request->empresa_id);
        return json_encode($empresa);
     }

     public function filtro_titulo(Request $request){
        return Vacante::filtro_titulo($request->titulo,$request->empresa_id);
     }

     public function consulta_id(Request $request){
        return Vacante::consulta_id($request->id);
     }

     static function modificar(Request $request){
        Vacante::modificar($request->id,
        $request->titulo,
        $request->fecha_creacion,
        $request->requisitos,
        $request->detalles_trabajo,
        $request->salario,
        $request->informacion_adicional);
    }

    static function eliminar(Request $request){
        Vacante::eliminar($request->id);
    }

    static function filtro(Request $request){
        return Vacante::filtro($request->titulo,$request->empresa_nombre);
    }
}
