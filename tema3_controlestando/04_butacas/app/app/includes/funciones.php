<?php

function calcular_precio($butacas){
    $preciobutaca=10;
    $butacasseleccionada=0;

    foreach ($butacas as $filas) {
        foreach ($filas as $ocupada) {
            if ($ocupada==1){
                $butacasseleccionada++;
            }
        }
    }

    $precio_final=$preciobutaca*$butacasseleccionada;
    return $precio_final;

}
