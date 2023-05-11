<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresa extends Model
{
    use HasFactory;

    static function consulta_correo($correo){
        /*
             SELECT nombre,calle,colonia,codigoPostal,descripcion,telefono,user_id 
             FROM empresas,users 
             WHERE empresas.user_id = users.id and correo = 'cactus@hotmail.com'
        */
                $candidato = DB::table('empresas')
               ->select('nombre','calle','colonia','codigoPostal','descripcion','telefono','user_id')
               ->join('users','empresas.user_id','=','users.id')
               ->where('correo', $correo)->get()->first();
               return $candidato;
            }

            static function alta($user_id){
                $empresa = new Empresa();
                $empresa->user_id = $user_id;
                $empresa->save();
            }

    static function modificar(
        $user_id,
        $nombre,
        $calle,
        $colonia,
        $codigoPostal,
        $descripcion,
        $telefono
    ){
        $empresa = Empresa::where('user_id',$user_id)->get()->first();
        $empresa->nombre = $nombre;
        $empresa->calle = $calle ;
        $empresa->colonia = $colonia;
        $empresa->codigoPostal = $codigoPostal;
        $empresa->descripcion = $descripcion;
        $empresa->telefono = $telefono;
        $empresa->save();
    }

}
