<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Candidato extends Model
{
    use HasFactory;

    static function consulta_correo($correo){
/*
    SELECT apellidoM,apellidoP,nombre,telefono,calle,colonia,codigoPostal,especialidad,user_id,correo 
    FROM candidatos,users 
    WHERE candidatos.user_id = users.id and correo = 'jeremy'
*/
        $candidato = DB::table('candidatos')
       ->select('candidatos.id','candidatos.fechaNac','candidatos.apellidoM','candidatos.apellidoP','candidatos.nombre','candidatos.telefono','candidatos.calle','candidatos.colonia','candidatos.codigoPostal','candidatos.especialidad','candidatos.user_id','users.correo')
       ->join('users','candidatos.user_id','=','users.id')
       ->where('correo', $correo)->get()->first();
       return $candidato;
    }

    static function consulta_id($id){
        /* 
         SELECT candidatos.id,nombre,apellidoM,apellidoP,telefono,calle,fechaNac,colonia,codigoPostal,especialidad,correo FROM candidatos,users
 WHERE candidatos.user_id = users.id
 AND candidatos.id = 1
        */
        $candidato = DB::table('candidatos')
        ->select('candidatos.id','candidatos.fechaNac','candidatos.apellidoM','candidatos.apellidoP','candidatos.nombre','candidatos.telefono','candidatos.calle','candidatos.colonia','candidatos.codigoPostal','candidatos.especialidad','candidatos.user_id','users.correo')
        ->join('users','candidatos.user_id','=','users.id')
        ->where('candidatos.id', $id)->get()->first();
        return $candidato;
    }

    static function alta($user_id){
        $candidato = new Candidato();
        $candidato->user_id = $user_id;
        $candidato->save();
    }

    static function modificar(
        $user_id,
        $fecha_nac,
        $apellido_p,
        $apellido_m,
        $nombre,
        $telefono,
        $calle,
        $colonia,
        $codigo_postal,
        $especialidad
        ){
        $candidato = Candidato::where('user_id',$user_id)->get()->first();
        $candidato->fechaNac = $fecha_nac;
        $candidato->apellidoP = $apellido_p;
        $candidato->apellidoM = $apellido_m;
        $candidato->nombre = $nombre;
        $candidato->telefono = $telefono;
        $candidato->calle = $calle;
        $candidato->colonia = $colonia;
        $candidato->codigoPostal = $codigo_postal;
        $candidato->especialidad = $especialidad;
        $candidato->save();
    }

    static function show(){
        $candidatos = DB::table('candidatos')
        ->select('candidatos.id','candidatos.fechaNac','candidatos.apellidoM','candidatos.apellidoP','candidatos.nombre','candidatos.telefono','candidatos.calle','candidatos.colonia','candidatos.codigoPostal','candidatos.especialidad','candidatos.user_id','users.correo')
        ->join('users','candidatos.user_id','=','users.id')->get()->take(20);
        return $candidatos;
    }
    static function consulta($nombre,$especialidad,$correo){
        /*SELECT nombre, especialidad,correo
          FROM candidatos,users
          WHERE candidatos.user_id = users.id and 
          nombre LIKE 'j%' and correo LIKE '%' 
          AND especialidad like '%'  
        */

        $candidatos = DB::select('SELECT candidatos.id,nombre, especialidad,correo 
        FROM candidatos,users
        WHERE candidatos.user_id = users.id and 
        nombre LIKE ?
        and especialidad LIKE ?
        and correo LIKE ?',[$nombre.'%',$especialidad.'%',$correo.'%']);
        return $candidatos;
    }
    static function consulta_postulantes($vacante_id,$empresa_id){
        /* 
        SELECT candidatos.id,candidatos.fechaNac,candidatos.apellidoP,candidatos.apellidoM,candidatos.nombre,candidatos.telefono,candidatos.calle,candidatos.colonia,candidatos.codigoPostal,candidatos.especialidad,candidatos.user_id,users.correo
        FROM aplicaciones,vacantes,candidatos,users
        WHERE aplicaciones.vacante_id = vacantes.id
        and aplicaciones.candidato_id = candidatos.id AND candidatos.user_id = users.id 
        AND vacantes.id = 3
        AND empresa_id = 3

        */

        $candidatos = DB::select('SELECT candidatos.id,candidatos.fechaNac,candidatos.apellidoP,candidatos.apellidoM,candidatos.nombre,candidatos.telefono,candidatos.calle,candidatos.colonia,candidatos.codigoPostal,candidatos.especialidad,candidatos.user_id,users.correo
        FROM aplicaciones,vacantes,candidatos,users
        WHERE aplicaciones.vacante_id = vacantes.id
        and aplicaciones.candidato_id = candidatos.id AND candidatos.user_id = users.id 
        AND vacantes.id = ?
        AND empresa_id = ?',[$vacante_id,$empresa_id]);
        return $candidatos;
    }
}


