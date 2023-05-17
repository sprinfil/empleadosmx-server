<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vacante extends Model
{
    use HasFactory;

    static function alta(
        $empresa_id,
        $titulo,
        $fecha_creacion,
        $requisitos,
        $detalles_trabajo,
        $salario,
        $informacion_adicional
        ){
        $vacante = new Vacante();
        $vacante->empresa_id = $empresa_id;
        $vacante->titulo = $titulo;
        $vacante->fecha_creacion = $fecha_creacion;
        $vacante->requisitos = $requisitos;
        $vacante->detalles_trabajo = $detalles_trabajo;
        $vacante->salario = $salario;
        $vacante->informacion_adicional = $informacion_adicional;
        $vacante->save();
    }

    static function consulta_empresaid($empresa_id){
        $vacante = Vacante::where('empresa_id',$empresa_id)->get()->take(20);
        return $vacante;
    }

    static function filtro_titulo($titulo,$empresa_id){
        /*
        SELECT titulo,requisitos,salario
        FROM vacantes,empresas
        WHERE vacantes.empresa_id=empresas.id and titulo LIKE '%'
           
           $vacantes = Vacante::where('nombre','like',$titulo."%")->toSql();
            return $vacantes;

                    $vacantes = DB::select('SELECT vacantes.titulo,vacantes.requisitos,vacantes.salario 
        FROM vacantes,empresas
        WHERE vacantes.empresa_id=? and titulo LIKE ?',[$empresa_id,$titulo.'%']);
        */
        $vacantes = DB::select('SELECT vacantes.id,vacantes.titulo,vacantes.requisitos,vacantes.salario 
        FROM vacantes,empresas
        WHERE vacantes.empresa_id=empresas.id and empresa_id = ? and titulo like ?',[$empresa_id,$titulo."%"]);
        return $vacantes;
    }

    static function consulta_id($id){
        $vacante = Vacante::where('id',$id)->get()->first();
        return $vacante;
    }

    static function modificar(
        $id,
        $titulo,
        $fecha_creacion,
        $requisitos,
        $detalles_trabajo,
        $salario,
        $informacion_adicional
    ){
        $vacante = Vacante::where('id',$id)->get()->first();
        $vacante->titulo =  $titulo;
        $vacante->fecha_creacion =  $fecha_creacion;
        $vacante->requisitos =  $requisitos;
        $vacante->detalles_trabajo =  $detalles_trabajo;
        $vacante->salario = $salario;
        $vacante->informacion_adicional =  $informacion_adicional;
        $vacante->save();
    }

    static function eliminar($id){
        $vacante = Vacante::find($id);
        Aplicacione::where('vacante_id',$id)->delete();
        $vacante->delete();
    }

    static function filtro($titulo,$empresa_nombre){
        /*
SELECT titulo,fecha_creacion,requisitos,detalles_trabajo,salario,informacion_adicional,empresa_id,empresas.nombre
FROM vacantes,empresas 
WHERE vacantes.empresa_id = empresas.id AND titulo LIKE '%' And empresas.nombre LIKE '%'
        */
        $vacantes = DB::select('SELECT vacantes.id,titulo,fecha_creacion,requisitos,detalles_trabajo,salario,informacion_adicional,empresa_id,empresas.nombre
        FROM vacantes,empresas 
        WHERE vacantes.empresa_id = empresas.id AND titulo LIKE ? and empresas.nombre LIKE ?',[$titulo."%",$empresa_nombre."%"]);
        return $vacantes;
    }
}
