<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $informacion_adicional,
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
}
