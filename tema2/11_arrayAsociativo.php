<?php
$persona = [
    'nombre' => 'Alicia',
    'apellidos' => 'Camacho',
    'edad' => 24,
    'email' => 'alicia.camacho@gmail.com'
];

$edades = [
    'Bárbara' => 30,
    'Camilo' => 25,
    'Andrés' => 28
];

echo '<ul>';
echo '<li>Nombre: ' . $persona['nombre'] . '</li>';
echo '<li>Apellidos: ' . $persona['apellidos'] . '</li>';
echo '<li>Edad: ' . $persona['edad'] . '</li>';
echo '<li>Email: ' . $persona['email'] . '</li>';
echo '</ul>';

print "<p>Bárbara tiene {$edades['Bárbara']} años</p>";
print "<p>Camilo tiene {$edades['Camilo']} años</p>";
print "<p>Andrés tiene " . $edades['Andrés'] . " años</p>";

echo '<p>El array tiene ' . count($edades) . ' personas.</p>';
echo '<ul>';
foreach ($edades as $nombre => $edad) {
    echo "<li>$nombre tiene $edad años</li>";
}
echo '</ul>';

echo '<ul>';
foreach ($edades as $edad) {
    echo "<li>$edad años</li>";
}
echo '</ul>';

?>