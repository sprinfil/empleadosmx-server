<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function consulta_correo(Request $request){
        $candidato = Empresa::consulta_correo($request->correo);
        return json_encode($candidato);
     }
     
     public function alta(Request $request){
        Empresa::alta($request->user_id);
     }
}
