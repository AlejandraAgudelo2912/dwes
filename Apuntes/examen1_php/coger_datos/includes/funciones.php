<?php
    function recoge($var)
    {
        if (isset($_REQUEST[$var])) {
            if ($_REQUEST[$var] != "") {
                if (is_array($_REQUEST[$var])) {
                    $tmp = [];
                    foreach ($_REQUEST[$var] as $valor) {
                        $tmp[] = trim(htmlspecialchars(strip_tags($valor)));
                    }
                    return $tmp;
                } else {
                    $tmp = trim(htmlspecialchars(strip_tags($_REQUEST[$var])));
                    return $tmp;
                }
            }
        }
        return null;
    }
?>