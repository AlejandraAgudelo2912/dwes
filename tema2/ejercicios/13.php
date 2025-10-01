<?php

function dividir($a, $b) {
    if ($b == 0) {
      throw new Exception("Division por cero",);
    }
    return $a / $b;
}

$x=5;
$y=0;

echo "$x / $y = " . dividir($x, $y) . "\n";

echo "<hr>";
require 'funciones/utilidades.php';
$lista = [1,2,3,4,5,'6',7,8,9];

?>