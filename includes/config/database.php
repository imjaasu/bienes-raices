<?php

function conectarDB () : mysqli{
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

    if(!$db){
        echo "Error al establecer conexión con la base de datos";
        exit;
    } 

    return $db;
}