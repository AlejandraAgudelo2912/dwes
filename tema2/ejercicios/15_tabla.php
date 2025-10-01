<?php

$a = [
    [
        'Nombre' => 'Mauro',
        'Apellido' => 'Chojrin',
        'Correo' => 'mauro.chojrin@leewayweb.com',
    ],
    [
        'Nombre' => 'Alberto',
        'Apellido' => 'Loffatti',
        'Correo' => 'aloffatti@hotmail.com',
    ],
    [
        'Nombre' => 'Foo',
        'Apellido' => 'Bar',
        'Correo' => 'foo_bar@example.com',
    ]
];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
   
</head>
<body>  

    <table border="1">
        <thead>
            <tr>
               <?php foreach ($a[0] as $campo => $value){
                 echo "<th>$campo</th>"; 
               }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($a as $persona) : ?>
                <tr>
                    <td><?php echo $persona['Nombre']; ?></td>
                    <td><?php echo $persona['Apellido']; ?></td>
                    <td><?php echo $persona['Correo']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
