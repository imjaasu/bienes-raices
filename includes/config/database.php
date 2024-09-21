<?php

function conectarDB () : mysqli{
    //abre una conexión con la base de datos
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

    if(!$db){
        echo "Error al establecer conexión con la base de datos";
        exit;
    } 

    return $db;
}