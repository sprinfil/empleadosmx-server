<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CandidatoController extends Controller
{
    public function consulta_correo(Request $request){
       $candidato = Candidato::consulta_correo($request->correo);
       return json_encode($candidato);
    }

    public function alta(Request $request){
        Candidato::alta($request->user_id);
     }

     public function modificar(Request $request){
      Candidato::modificar(
         $request->user_id,
         $request->fecha_nac,
         $request->apellido_p,
         $request->apellido_m,
         $request->nombre,
         $request->telefono,
         $request->calle,
         $request->colonia,
         $request->codigo_postal,
         $request->especialidad);
   }

   public function show(){
      return Candidato::show();
   }

   public function consulta(Request $request){
      return Candidato::consulta(
         $request->nombre,
         $request->especialidad,
         $request->correo
      );
   }
}
