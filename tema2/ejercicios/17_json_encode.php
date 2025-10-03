<?php
$edades= array("Ana"=>23, 
                "Luis"=>21, 
                "Carlos"=>25);

echo json_encode($edades);

echo "<hr>";

$productos =[
    ["id"=>1, "nombre"=>"Laptop", "precio"=>1200],
    ["id"=>2, "nombre"=>"Mouse", "precio"=>20],
    ["id"=>3, "nombre"=>"Teclado", "precio"=>50]
];
echo json_encode($productos, JSON_PRETTY_PRINT);
//header('Content-Type: application/json');

echo "<hr>";
class Persona{
    public $nombre;
    public $apellidos;

    public function __construct($nombre, $apellidos){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }
}

$persona = new Persona("Juan", "Marcos Rubio");
echo json_encode($persona);

?>