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
}
