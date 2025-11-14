<?php
session_start();
require_once "includes/funciones.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>03_stickyform</title>
</head>

<body class="body-tipo2">
  <header>
    <h1>3 Sticky form</h1>
  </header>
  <main>
 
    <!-- usar 
       action = "< ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
     -->
  <form action="procesar.php" method="post">
      <p>Nombre: <input type="text" name="nombre" value="<?php echo $_SESSION['nombre'] ?? "";?>"></p>
      <p>Edad: <input type="text" name="edad" value="<?php echo $_SESSION['edad'] ?? "";?>"></p>
      </p>
      <input type="radio" name="sexo" value="hombre" <?php if (isset($_SESSION['sexo']) && $_SESSION['sexo'] == 'hombre') echo 'checked'; ?>> Hombre
      <input type="radio" name="sexo" value="mujer" <?php if (isset($_SESSION['sexo']) && $_SESSION['sexo'] == 'mujer') echo 'checked'; ?>> Mujer
      <input type="radio" name="sexo" value="otro" <?php if (isset($_SESSION['sexo']) && $_SESSION['sexo'] == 'otro') echo 'checked'; ?>> Otro
    </p>
      <input type ="checkbox" name="aficiones[]" value="musica" <?php if (isset($_SESSION['aficiones']) && in_array('musica', $_SESSION['aficiones'])) echo 'checked'; ?>> Música
      <input type ="checkbox" name="aficiones[]" value="cine" <?php if (isset($_SESSION['aficiones']) && in_array('cine', $_SESSION['aficiones'])) echo 'checked'; ?>> Cine
      <input type ="checkbox" name="aficiones[]" value="lectura" <?php if (isset($_SESSION['aficiones']) && in_array('lectura', $_SESSION['aficiones'])) echo 'checked'; ?>> Lectura
      </p>

      <p><input type="submit" name="submit" value="Enviar"></p>
      <?php
      if (isset($_SESSION["errores"])) {
          foreach ($_SESSION["errores"] as $error) {
              echo "<p class='error'>$error</p>";
          }
          unset($_SESSION["errores"]);
          unset($_SESSION["nombre"]);
          unset($_SESSION["edad"]);
          unset($_SESSION["aficiones"]);
 
      }
      ?>
    </form>

  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>