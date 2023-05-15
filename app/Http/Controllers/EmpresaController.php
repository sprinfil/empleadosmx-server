<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function consulta_correo(Request $request){
        $empresa = Empresa::consulta_correo($request->correo);
        return json_encode($empresa);
     }

     public function consulta_id(Request $request){
      $empresa = Empresa::consulta_id($request->id);
      return json_encode($empresa);
   }
     
     public function alta(Request $request){
        Empresa::alta($request->user_id);
     }

     public function modificar(Request $request){
      Empresa::modificar(
         $request->user_id,
         $request->nombre,
         $request->calle,
         $request->colonia,
         $request->codigoPostal,
         $request->descripcion,
         $request->telefono
      );
     }
}
