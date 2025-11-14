<?php
session_start();

$action = $_POST['accion'] ?? '';

setcookie('pulsaciones', ($_COOKIE['pulsaciones']) + 1, time() + 3600);

if ($action =='cero' ) {
    $_SESSION['numero'] = 0;

    setcookie('pulsaciones', 0, time() + 3600);

} elseif ($action == 'subir') {
    
    if($_SESSION['numero'] =='9'){
        $_SESSION['numero']=9;

    }else{
        $_SESSION['numero']++;

    }
   
} elseif ($action == 'bajar') {

    if($_SESSION['numero'] =='0'){
        $_SESSION['numero']=0;

    }else{
        $_SESSION['numero']--;

    }

}

header('Location: index.php');
exit;

