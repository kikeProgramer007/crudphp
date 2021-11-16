<?php 
    $mysqli = new mysqli('localhost','usuario007','1234567890','personal');
    if($mysqli->connect_error){
        die('Error en la conexion' . $mysqli->connect_error);
    }
    
    // printf ("Servidor Información: %s\n", $mysqli->server_info);
?>