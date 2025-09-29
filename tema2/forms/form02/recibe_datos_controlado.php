<?php
## recogemos los datos con POST, y solo permitimos POST
if ($_SERVER["REQUEST_METHOD"] != "POST"){
    echo "ERROR: No se han recibido datos del formulario";

    print "<p><a href='index.php'>Volver al formulario</a></p>";
}
?>