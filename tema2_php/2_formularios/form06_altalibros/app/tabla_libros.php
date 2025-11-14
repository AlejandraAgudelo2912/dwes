 <?php
require_once ("includes/funciones.php");
require_once ("models/book.php");


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["eliminar"])) {
    $titulo = $_POST["titulo"];
    borrarLibro($titulo);
    echo "<p style='color:green;'>El libro '$titulo' ha sido eliminado.</p>";
}
$listaLibros = obtener();

    if(empty($listaLibros)){
        echo "<h2>No hay libros en la lista</h2>";
    }else{
        echo "<h2>Número de libros: " . count($listaLibros) . "</h2>";
        echo "<table>";
        echo "<thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Carátula</th>
            <th>Género</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>";

        foreach($listaLibros as $libro){
            echo "<tr>";
            echo "<td>" . $libro->title . "</td>";
            echo "<td>" . $libro->author . "</td>";
            echo "<td>" . $libro->year . "</td>";
            echo "<td>";

            if(!empty($libro->caratula)){
                echo "<img src='" . $libro->caratula . "' alt='Carátula de " . $libro->title . "' class='caratula'>";
            }else{
                echo "<img src='bbdd/portadas/generico.jpg' alt='Carátula genérica' class='caratula'>";
            }

            echo "</td>";
            echo "<td>
                <li>";

            foreach($libro->genre as $genero){
                echo "<label>$genero</label><br>";
            }
            echo "</li></td>";
            echo "<td>";

            echo "<div>
            <a href='ver.php?title=".$libro->title."'>Ver</a>
                <form method='POST'>
                    <input type='hidden' name='titulo' value='" . $libro->title . "'>
                    <button type='submit' name='eliminar'>Eliminar</button>
                </form>";

            echo "</div></td></tr>";
        }
        echo "</tbody></table>";
    }



?>