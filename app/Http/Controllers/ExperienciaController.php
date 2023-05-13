<?php

namespace App\Http\Controllers;

use COM;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Experiencia;

class ExperienciaController extends Controller
{
    public function alta(Request $request)
    {
        Experiencia::alta(
            $request->curriculu_id,
            $request->fecha_inicio,
            $request->fecha_fin,
            $request->descripcion,
            $request->puesto,
            $request->empresa,
            $request->ciudad
        );
    }
    public function show(Request $request){
        return Experiencia::show($request->curriculu_id);
    }
}
