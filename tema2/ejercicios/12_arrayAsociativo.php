<?php

$persona = [
    'nombre' => 'Alicia',
    'apellidos' => 'Camacho',
    'edad' => 24,
    'email' => ['alicia.camacho@gmail.com', 'email2'],
    'calificaciones' => ["PHP" => 8, "DWES" => 9, "DIW" => ["Primer" => 7, "Segundo" => 6]]
];


echo '<ul>';
echo '<li>Nombre: ' . $persona['nombre'] . '</li>';
echo '<li>Apellidos: ' . $persona['apellidos'] . '</li>';
echo '<li>Edad: ' . $persona['edad'] . '</li>';
echo '<li>Email 1: ' . $persona['email'][0] . '</li>';
echo '<li>Email 2: ' . $persona['email'][1] . '</li>';

//lista de materias
foreach ($persona['calificaciones'] as $asignatura=> $nota) {
    echo '<li>' . $asignatura . '</li>';
    
}

echo '<li>Calificación PHP: ' . $persona['calificaciones']['PHP'] . '</li>';
echo '<li>Calificación DWES: ' . $persona['calificaciones']['DWES'] . '</li>';
echo '<li>Calificación DIW: ' . $persona['calificaciones']['DIW']["Primer"] . '</li>';
echo '<li>Calificación DIW: ' . $persona['calificaciones']['DIW']["Segundo"] . '</li>';
echo '</ul>';

?>