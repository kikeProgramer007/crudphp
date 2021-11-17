<?php
    require 'conexion.php';
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $estado_civil = $_POST['estado_civil'];
    $hijos = isset($_POST['hijo']) ? $_POST['hijos'] : 0;
	$intereses = isset($_POST['intereses']) ? $_POST['intereses'] : null;
  
    $arrayIntereses = null;
	
	$num_array = count($intereses);
	$contador = 0;
	
	if($num_array>0){
		foreach ($intereses as $key => $value) {
			if ($contador != $num_array-1)
			$arrayIntereses .= $value.' ';
			else
			$arrayIntereses .= $value;
			$contador++;
		}
	}
	// ESTO ES PARA USAR CONSULTA SQL PARA GUARDAR UN REGISTRO
	$sql = "INSERT INTO personas (nombre, correo, telefono, estado_civil, hijos, intereses) VALUES ('$nombre', '$email', '$telefono', '$estado_civil', '$hijos', '$arrayIntereses')";
    // PARA EJECURAR LA CONSULTA
    $resultado = $mysqli->query($sql);   //EL RESULTADO VA SER BOOLEANO

	//GUARDANDO IMAGEN
	$id_insert = $mysqli->insert_id;
	if($_FILES["archivo"]["error"]>0){
		echo "Error al cargar archivo";
	}else {
		$permitidos= array("image/png","image/gif","application/pdf");
		$limite_kb = 200;
		if (in_array($_FILES["archivo"]["type"],$permitidos) && $_FILES["archivo"]["size"]<=$limite_kb * 1024) {
			$ruta = 'files/'.$id_insert.'/';
			$archivo = $ruta.$_FILES["archivo"]["name"];
			if (!file_exists($ruta)) {
				mkdir($ruta);
			}

			if (!file_exists($archivo)) {
				$resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
				if ($resultado) {
					echo "Archivo guardado";
				}else {
					echo "Error al guardar archivo";
				}
			}else {
				echo "El archivo ya existe";
			}

		}else {
			echo "Archivo no permitido o excede el tamaño";
		}
	}
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
						<h3>REGISTRO GUARDADO</h3>   
						<?php } else { ?>      <!--ABRIENDO Y CERRANDO PHP -->
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>    <!--ABRIENDO Y CERRANDO PHP -->
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
