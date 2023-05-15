<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aplicacione extends Model
{
    use HasFactory;
    static function alta($candidato_id,$vacante_id){
        /*
        SELECT * FROM aplicaciones
        WHERE candidato_id =1 AND vacante_id = 1 
        */

        $aplicacion = DB::select('SELECT * FROM aplicaciones
        Where candidato_id = ? and vacante_id = ?',[$candidato_id,$vacante_id]);

        if($aplicacion){
            return "1";
        }else{
            $aplicacion = new Aplicacione();
            $aplicacion->candidato_id = $candidato_id;
            $aplicacion->vacante_id = $vacante_id;
            $aplicacion->save();
        }
    }
}
