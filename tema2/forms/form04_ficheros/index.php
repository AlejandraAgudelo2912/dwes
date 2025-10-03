<?php
require_once("includes/funciones.php");
$subidaOK=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //############################## depuracion
     print "<pre>";
     print "Matriz \$_FILES" . "<br>";
     print_r($_FILES);
     print "</pre>\n";
    //#######################################
    if($_FILES['fichero']['size']>1000000){
        $mensaje="El fichero es demasiado grande";
    }else{
        ///tamaño correcto
        $ruta_subida = "bbdd/";
        $res=move_uploaded_file($_FILES['fichero']['tmp_name'], 
        $ruta_subida.$_FILES['fichero']['name']);

        if($res){
            $mensaje="Fichero subido correctamente";
            $subidaOK=true;
            $num_ficheros=numero_ficheros_directorio($ruta_subida);

        }else{
            $mensaje="Error al subir el fichero";

        }
    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>form_03</title>
</head>

<body>
  <header>
    <h1>Formulario 04 </h1>
    <p class="centrado">Subida de ficheros</p>
    <br><br>
   
  </header>
  <main>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <fieldset>
           <legend>Subida de archivo</legend>
           <p>Tamaño maximo de 1 MB  
            <input type="file" name="fichero"></p>
            <p><button type="submit" name="submit" value="subirimagen">Subir Imagen</button></p>
    </fieldset>        
    </form>

    <?php
        if(isset($mensaje)){
            echo "<p class='mensaje'>$mensaje</p>";
        }
        if($subidaOK){
          echo ("Datos del fichero:<br>");
          $nombreDelFichero=$_FILES['fichero']['name'];
          $tamBytes=$_FILES['fichero']['size'];
          $tamKB=round($tamBytes/1024);
          echo ("Nombre: $nombreDelFichero <br>");
          echo ("Tamaño: $tamBytes bytes | $tamKB KB <br>");
          echo "<img src='bbdd/$nombreDelFichero' alt='imagen subida' width='300px'>";
          echo "<p>Numero de ficheros en la ruta bbdd/: $num_ficheros</p>";
        }



    ?>
  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>