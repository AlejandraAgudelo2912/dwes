<?php
use App\Models\Basedatos;


if ($boton!="volver"){
    $db = new Basedatos();
    if($db->resolver_inicidencia($id, $incidencia)){
        enviar_log($id, "infof");

    }
}


