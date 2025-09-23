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
$num=[3,6,1,80,9];
echo mayor($num);
?>