<?php

include_once ("includes/funciones.php");
include_once ("models/book.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    die;
}
else{
   $listaLibros=obtener();
   if($listaLibros==null){
       $listaLibros=[];
       
   }else{
        $jsonData = json_encode($listaLibros, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        header("Location: index.php?listaLibros=$jsonData");
        die;

    }

   
    
}