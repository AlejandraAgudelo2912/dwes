<?php 
require_once 'includes/funciones.php';

$duracion = 86400;

session_set_cookie_params($duracion);

session_start();

$columnas=4;
$filas=3;

if(!isset($_SESSION['butacas'])){
  $butacas = [];
  for ($i = 1; $i <= $filas; $i++) {
    for ($j = 1; $j <= $columnas; $j++) {
      $butacas[$i][$j] = 0;
    }
  }
  $_SESSION['butacas'] = $butacas;
  
}


if($_SERVER['REQUEST_METHOD']=='POST'){
  $fila=$_POST['fila_seleccionada'];
  $columna=$_POST['columna_seleccionada'];

  if ($_SESSION['butacas'][$fila][$columna] == 0) {
    $_SESSION['butacas'][$fila][$columna] = 1;
  } else {
    $_SESSION['butacas'][$fila][$columna] = 0;
  }
}

$precio= calcular_precio($_SESSION['butacas']);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butacas</title>
    <link rel="stylesheet" href="assets/css/estilos2.css">
</head>
<body>

<h1>🎥 Vista de Butacas del Cine</h1>

<div class="pantalla">PANTALLA</div>

<!-- Formulario único -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="formButacas">

  <input type="hidden" name='fila_seleccionada' id='fila_seleccionada' >
  <input type="hidden" name='columna_seleccionada' id='columna_seleccionada'>

</form>

<div class="sala">
  <div class="fila">
    <?php
      for ($fila = 1; $fila <= $filas; $fila++) {
        for ($columna = 1; $columna <= $columnas; $columna++) {
          if($_SESSION["butacas"][$fila][$columna]==0){
            echo "<img src='assets/asiento-libre" . ".png' 
                    class='butaca' 
                    data-fila='$fila' 
                    data-columna='$columna' 
                    alt='Butaca Fila $fila Columna $columna' />";
          }else{
            echo "<img src='assets/asiento-ocupado" . ".png' 
                    class='butaca' 
                    data-fila='$fila' 
                    data-columna='$columna' 
                    alt='Butaca Fila $fila Columna $columna' />";
          }
        }
        echo "</div><div class='fila'>"; 
      }
    ?>
  
    </div>

</div>

<script>
// Al hacer clic en una imagen, guarda el número y envía el formulario. 
// Vamos a usar DATASET. Para ello, en las imagenes incluifremos el 
// atributo 'data-fila' y 'data-columna'

document.querySelectorAll('.butaca').forEach(butaca => {
  butaca.addEventListener('click', () => {
    const fila = butaca.dataset.fila;
    const columna = butaca.dataset.columna;

    console.log("fila:"+fila);
    console.log("columna:"+columna);
        
    //Asignamos a los campos input hidden el valor
    document.getElementById('fila_seleccionada').value = fila;
    document.getElementById('columna_seleccionada').value = columna;
    document.getElementById('formButacas').submit();
  });
});
</script>

<div class="leyenda">
  <div class="cuadro" style="background-color:red;"></div> Libre
  <div class="cuadro" style="background-color:yellow; margin-left:15px;"></div> Ocupada
</div>

<h2>PRECIO TOTAL: 
  <?php
  echo $precio;?>

€</h2>

<?php

  //----depuracion------
   //print ("<pre>");
  // print("Butaca pulsada:<br>");
   //print_r($_POST); 
   //print ("<hr>");

  // print_r($_SESSION); 
   //print("</pre>");
  //------fin depura------      
?>

</body>
</html>