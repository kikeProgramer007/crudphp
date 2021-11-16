<?php 
    
    require 'conexion.php';    //PARA ESTABLECER CONEXION CON MYSQL
  
    $where = ""; // SE DECLARA UN ESPACIO VACIO
	
	if(!empty($_POST))  //SI LA VARIABLE POST NO EXITS ENTONCES
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){ //SI EL VALOR NO EXISTE ENTONCES
			$where = "WHERE nombre LIKE '$valor%'";  //COMPARA SI ALGUNA LETRA SE PARECE A ALGUN REGISTRO
		}
	}
	$sql = "SELECT * FROM personas $where"; //SI NO HAY NADA Q BUSCAR Q MUESTRE TODOS LOS REGISTROS
	$resultado = $mysqli->query($sql);

?>

<html lang="es">
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
                <h2 style="text-align:center">Creando Registros</h2> 
          </div>
         <!-- ESTO ES PARA COLOCAR UN BOTON DE "NUEVO REGISTRO"-->
          <div class="row">
              <a href="nuevo.php" class="btn btn-primary">Nuevo registro </a><!--OJO ESTO REDIRRECIONA A "nuevo.php"-->

            <!-- CREACION DEL FORMULARIO PARA BUSCAR UN REGISTRO -->
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>Nombre: </b><input type="text" id="campo" name="campo" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" /><!--class="btn btn-info" -- Es para el diseño del botom-->
				</form>

          </div>



          <!--------- CREACION DEL DISEÑO DE LA TABLE ------------>
          <br> <!-- SALTO DE LINEA -->
          <div class="row table-responsive">  <!--UNA TABLA RESPONSIVA ES DECIR SE AJUSTA DE MANERA AUTOMATICA-->
                <table class="table table-striped">
                   <thead> <!--PARA AGREGAR LA CABECERA DE LA TABLE Q MOSTRARA LOS REGISTROS-->
						<tr>  
							<th>ID</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Telefono</th>
							<th></th>
							<th></th>
						</tr>
				   </thead>

                    <tbody><!--PARA AGREGAR EL CUERPO DE LA TABLA Q MOSTRARA LOS REGISTROS  -->
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>  <!--<PHP> DEVUELVE PARAMETROS DE LA TABLE-->
							<tr>
								<td><?php echo $row['id']; ?></td>       <!--<PHP>MUESTRA EL ID DE LA BD-->
								<td><?php echo $row['nombre']; ?></td>   <!--<PHP>MUESTRA NOMBRE ID DE LA BD-->
								<td><?php echo $row['correo']; ?></td>   <!--<PHP>MUESTRA CORREO DE LA BD-->
								<td><?php echo $row['telefono']; ?></td> <!--<PHP>MUESTRA TELF DE LA BD-->
                                <!--<PHP-HTML> REDIRECCIONA AL ARC. modificar.php DEACUERDO A UN ID -->  <!--SE AGREGA EL ICONO DE MODIFICAR--->
								<td><a href="modificar.php?id=<?php echo $row['id']; ?>"> <span class="glyphicon glyphicon-pencil"></span></a></td>
                                <!--<PHP-HTML> REDIRECCIONA AL ARC. eliminar.php DEACUERDO A UN ID -->  <!--SE AGREGA EL ICONO DE ELIMINACION--->
								<td><a href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
							</tr>
						<?php } ?>
					</tbody>

                </table> <!-- ojo creo que es sin esto -->
          </div>
        </div>

        <!-- "MODAL" ES CODIGO EFECTUARA UNA VENTANA DE CONFIRMACION O CANCELACION DEL BOTOM ALIMINAR-->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>

        <script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	

    </body>

</html>