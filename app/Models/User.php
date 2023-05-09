<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;
    
    static function alta($user_correo){
        $user = User::where('correo',$user_correo)->get()->first();
        if($user){

        }else{
            $user = new User();
            $user->correo = $user_correo;
            $user->save();
        }
    }

    static function consulta_correo($user_correo){
        $user = User::where('correo',$user_correo)->get()->first();
        return $user;
    }

    static function consulta_id($user_id){
        $user = User::where('id',$user_id)->get()->first();
        return $user;
    }
}

