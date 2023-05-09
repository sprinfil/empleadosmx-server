<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function alta(Request $request){
        User::alta($request->correo);
    }

    public function consulta_correo(Request $request){
        $user = User::consulta_correo($request->correo);
        return json_encode($user);
     }

     public function consulta_id(Request $request){
        $user = User::consulta_id($request->user_id);
        return json_encode($user);
     }
}
