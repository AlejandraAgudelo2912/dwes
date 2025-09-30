<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  print "<pre>";
  print "Matriz \$_POST" . "<br>";
  print_r($_POST);
  print "</pre>\n";

    if(isset($_POST['nombre']) && ($_POST["nombre"]!="")){
        $nombre = $_POST['nombre'];
    }else{
        $nombreError = "No se ha recibido el nombre";
    }

     if(isset($_POST['edad']) && ($_POST["edad"]!="")){
        if (is_numeric($_POST['edad'])){
            if(($_POST['edad']<0) || ($_POST['edad']>150)){
                $edadError = "La edad debe estar entre 0 y 150";
            }
            else{
                $edad = $_POST['edad'];
            }
        }else{
             $edadError = "La edad debe ser un valor numérico";
        }
    }else{
        $edadError = "No se ha recibido la edad";
    }

}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>form_02</title>
</head>

<body>
  <h1>####################Incompleto####################</h1>
  <header>
    <h1>Formulario 02 - el form recibe los datos</h1>
  </header>
  <main>
    
    <!-- usar 
       action = "< ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
     -->
    <form action="index.php" method="post">
        <fieldset>
          <legend>Envio tipo POST</legend>
          <p>
            <!-- al usar <label> y que coincida con el id del <input> correspondiente, permite que al hacer click 
            en el texto del <label>, el cursor se coloque directamente en el campo asociado -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" autofocus>
          </p>
          <p>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad">
          </p>

          <p>Sexo:<p>
          <input type="radio" id="sexo_masculino" name="sexo" value="M">
          <label for="sexo_masculino">Masculino</label> 

          <input type="radio" id="sexo_femenino" name="sexo" value="F">
          <label for="sexo_femenino">Femenino</label>

          <input type="radio" id="sexo_otro" name="sexo" value="O">
          <label for="sexo_otro">Otro</label>
          </p>

          <p>Aficiones:<p>
            <input type="checkbox" name="aficiones[]" value="musica">Musica<br>
            <input type="checkbox" name="aficiones[]" value="cine">Cine<br>
            <input type="checkbox" name="aficiones[]" value="lectura">Lectura<br>
          </p>
        </fieldset>

          <p>
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
          </p>
    </form>

    <?php
      if (isset($nombreError)){
         print "<p class='error'>ERROR: $nombreError </p>";
      }
      if (isset($edadError)){
         print "<p class='error'>ERROR: $edadError </p>";
      }
      ?>
      <br><br>
    <div class="datos-recibidos">
      <?php
        if (isset($nombre)){
            print "-Nombre: $nombre <br>";
        } 
        if (isset($edad)){
            print "-Edad: $edad <br>";
        }
      ?>
    </div>
    <br><br>
     <form action="recibe_datos_controlado.php" method="post">
        <fieldset>
          <legend>Envio tipo POST checkeo</legend>
          <p>
            <!-- al usar <label> y que coincida con el id del <input> correspondiente, permite que al hacer click 
            en el texto del <label>, el cursor se coloque directamente en el campo asociado -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" autofocus>
          </p>
          <p>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad">
          </p>
        </fieldset>

          <p>
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
          </p>
    </form>
    
  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>
