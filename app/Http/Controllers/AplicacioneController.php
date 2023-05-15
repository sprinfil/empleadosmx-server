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

}
