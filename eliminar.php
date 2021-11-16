<?php
    require 'conexion.php';
    $id = $_GET['id'];  //RETORNA EL ID SEGUN LA ELIMINACION
    
	// ESTO ES PARA USAR CONSULTA SQL PARA MODIFICAR UN REGISTRO SEGÚN UN ID
    $sql = "DELETE FROM personas WHERE id = '$id'";
    // PARA EJECURAR LA CONSULTA
    $resultado = $mysqli->query($sql); //EL RESULTADO VA SER BOOLEANO

?>

<html lang="es">
       <!-- LIBRERIAS -->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>

    <body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>   <!-- SI RESULTADO ES VERDADERO(BOOLEANO) -->
						<h3>REGISTRO ELIMINADO</h3>   
						<?php } else { ?>      <!--ABRIENDO Y CERRANDO PHP -->
						<h3>ERROR AL ELIMINAR/h3>
					<?php } ?>    <!--ABRIENDO Y CERRANDO PHP -->
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
