<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Aplicacione;

class AplicacioneController extends Controller
{
    //
    public function alta(Request $request){
        return Aplicacione::alta($request->candidato_id,$request->vacante_id);
    }

    public function postulaciones(Request $request){
        return Aplicacione::postulaciones($request->candidato_id, $request->titulo);
    }

    public function checar_nuevos_candidatos(Request $request){
        return Aplicacione::checar_nuevos_candidatos($request->empresa_id);
    }
    public function eliminar_aplicacion(Request $request){
        return Aplicacione::eliminar_aplicacion($request->candidato_id,$request->vacante_id);
    }
}
