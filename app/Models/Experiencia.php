<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;

    static function alta(
        $curriculu_id,
        $fecha_inicio,
        $fecha_fin,
        $descripcion,
        $puesto,
        $empresa,
        $ciudad
    ){
        $experiencia = new Experiencia();
        $experiencia->curriculu_id = $curriculu_id;
        $experiencia->fechaInicio = $fecha_inicio;
        $experiencia->fechaFin = $fecha_fin;
        $experiencia->descripcion = $descripcion;
        $experiencia->puesto = $puesto;
        $experiencia->empresa = $empresa;
        $experiencia->ciudad = $ciudad;
        $experiencia->save();
    }

    static function show($curriculu_id){
       return $experiencias = Experiencia::where('curriculu_id',$curriculu_id)->get();
    }

    static function modificar(
        $id,
        $fecha_inicio,
        $fecha_fin,
        $descripcion,
        $puesto,
        $empresa,
        $ciudad
        ){
        $experiencia = Experiencia::where('id',$id)->get()->first();
        $experiencia->fechaInicio = $fecha_inicio;
        $experiencia->fechaFin = $fecha_fin;
        $experiencia->descripcion = $descripcion;
        $experiencia->puesto = $puesto;
        $experiencia->empresa = $empresa;
        $experiencia->ciudad = $ciudad;
        $experiencia->save();
    }

    static function consulta_id($id){
        $experiencia = Experiencia::where('id',$id)->get()->first();
        return $experiencia;
    }

    static function eliminar($id){
        $experiencia = Experiencia::find($id);
        $experiencia->delete();
    }
}
