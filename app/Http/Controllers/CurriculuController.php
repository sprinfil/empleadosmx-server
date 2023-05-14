<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculu;
use Illuminate\Routing\Controller;

class CurriculuController extends Controller
{
    public function alta(Request $request){
        Curriculu::alta($request->candidato_id);
     }
     public function modificar(Request $request){
        Curriculu::modificar($request->candidato_id,$request->descripcion,$request->info_adicional,$request->habilidades);
     }
     public function consulta_candidato_id(Request $request){
        return Curriculu::consulta_candidato_id($request->candidato_id);
     }

}
