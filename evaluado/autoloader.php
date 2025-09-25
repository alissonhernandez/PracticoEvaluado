<?php
spl_autoload_register(function ($clase) {
    $ruta = __DIR__ . "/" . str_replace("\\", "/", $clase) . ".php";
    if (file_exists($ruta)) {
        require_once $ruta;
    } else{
        die("No se ha podido cargar la clase $ruta");
    }
});
?>