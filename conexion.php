<?php 
    $mysqli = new mysqli('localhost','root','','phpnativo_personas');
    if($mysqli->connect_error){
        die('Error en la conexion' . $mysqli->connect_error);
    }
    
    // printf ("Servidor Información: %s\n", $mysqli->server_info);
?>