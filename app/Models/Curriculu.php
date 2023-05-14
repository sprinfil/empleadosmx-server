<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculu extends Model
{
    use HasFactory;

    static function alta($candidato_id){
        $curriculu = new Curriculu();
        $curriculu->candidato_id = $candidato_id;
        $curriculu->save();
    }

    static function modificar(
        $candidato_id,
        $descripcion,
        $info_adicional,
        $habilidades
        ){
        $curriculu = Curriculu::where('candidato_id',$candidato_id)->get()->first();
        $curriculu->descripcion = $descripcion;
        $curriculu->informacionAdicional = $info_adicional;
        $curriculu->habilidades = $habilidades;
        $curriculu->save();
    }

    static function consulta_candidato_id($candidato_id){
        return $curriculu = Curriculu::where('candidato_id',$candidato_id)->get()->first();
    }

    
}
