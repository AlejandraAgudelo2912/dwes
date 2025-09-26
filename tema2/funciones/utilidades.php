<?php

function mayor($lista){

   $mayor = $lista[0];
   foreach ($lista as $value){
    if($value >$mayor){
        $mayor =$value;
    }
   }
   return $mayor;
   
}

function mayor_numero($lista){
    $mayor = $lista[0];
    foreach($lista as $value){
       if(!is_integer($value)){
        throw new Exception("El valor $value no es un numero entero");
       }
       if($value>$mayor){
        $mayor=$value;
    }

}
    
    
}

?>