<?php 
namespace App\models;

use DateTime;

class Tarea{
    public int $id;
    public string $descripcion;
    public DateTime $fecha_creacion;
    public bool $completada;

    public function __construct(int $id, string $descripcion, bool $completada = false){
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fecha_creacion = new DateTime();
        $this->completada = $completada;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }


}