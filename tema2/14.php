<?php

class Persona{
    private $DNI;
    private $nombre;
    private $apellidos;

    public function __construct($DNI, $nombre, $apellidos){
        $this->DNI=$DNI;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
    }

    public function __toString(){
        return "DNI: $this->DNI, Nombre: $this->nombre, Apellidos: $this->apellidos";
    }

    public function getDNI(){
        return $this->DNI;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }

}

$per = new Persona("12345678A", "Mauro", "Chojrin");
echo $per;

?>