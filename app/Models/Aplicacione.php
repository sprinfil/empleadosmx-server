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

    static function postulaciones($candidato_id,$titulo){
        /*
     SELECT * FROM aplicaciones,vacantes
WHERE aplicaciones.vacante_id = vacantes.id AND empresas.id = vacantes.empresa_id
AND candidato_id = 4 and  titulo LIKE '%'
        */
        $aplicacion = DB::select('    SELECT vacantes.id,titulo,fecha_creacion,requisitos,detalles_trabajo,salario,informacion_adicional,empresa_id FROM aplicaciones,vacantes,empresas
        WHERE aplicaciones.vacante_id = vacantes.id AND empresas.id = vacantes.empresa_id 
        AND candidato_id = ? and  titulo LIKE ?',[$candidato_id,$titulo."%"]);

        return $aplicacion;
    }

    static function checar_nuevos_candidatos($empresa_id){
        /*         
 SELECT * FROM aplicaciones,vacantes,empresas
WHERE aplicaciones.vacante_id = vacantes.id AND empresas.id = vacantes.empresa_id
AND empresas.id = 1 
         */
        $aplicacion = DB::select('SELECT * FROM aplicaciones,vacantes,empresas
        WHERE aplicaciones.vacante_id = vacantes.id AND empresas.id = vacantes.empresa_id 
        AND empresas.id = ?',[$empresa_id]);

        return $aplicacion;

    }

    static function eliminar_aplicacion($candidato_id,$vacante_id){
        /* 
        DELETE FROM aplicaciones WHERE  vacante_id = 1 AND candidato_id = 1
        */
        DB::delete('DELETE FROM aplicaciones WHERE  vacante_id = ? AND candidato_id = ?',
        [$vacante_id,$candidato_id]);
    }

}
