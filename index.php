<?php 

    require 'conexion.php';    //PARA ESTABLECER CONEXION CON MYSQL

?>

<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- ORIGINAL CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
		<!-- <link href="css/jquery.dataTables.min.css" rel="stylesheet"> -->
		<!-- datatables responisve NUEVO-->
 		<link href="css/datatables/bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables/responsive.bootstrap.min.css" rel="stylesheet">
		<!-- ORIGINAL JS-->
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<!-- <script src="js/jquery.dataTables.min.js"></script> -->
  		<!-- datatables rspnosive NUEVO -->
		<!-- <script src="js/datatables/jquery-3.5.1.js"></script> -->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>

		<script>
			$(document).ready( function () {
				$('#mitabla').DataTable({
					"order":[[1,"asc"]],
					"language": {
						"decimal": "",
						"emptyTable": "No hay información",
						"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
						"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
						"infoFiltered": "(Filtrado de _MAX_ total entradas)",
						"infoPostFix": "",
						"thousands": ",",
						"lengthMenu": "Mostrar _MENU_ Entradas",
						"loadingRecords": "Cargando...",
						"processing": "Procesando...",
						"search": "Buscar:",
						"zeroRecords": "Sin resultados encontrados",
						"paginate": {
							"first": "Primero",
							"last": "Ultimo",
							"next": "Siguiente",
							"previous": "Anterior"
						}
					},
					bProcessing:true,
					bServerSide: true,
					responsive: true,
					"sAjaxSource":"server_process.php"
				});
				new $.fn.dataTable.FixedHeader( table );
			} );
		</script>
    </head>
    
    <body>
        <div class="container">
          <div class="row">
                <h2 style="text-align:center">Creando Registros</h2> 
          </div>
         <!-- ESTO ES PARA COLOCAR UN BOTON DE "NUEVO REGISTRO"-->
          <div class="row">
              <a href="nuevo.php" class="btn btn-primary">Nuevo registro </a><!--OJO ESTO REDIRRECIONA A "nuevo.php"-->
          </div>



          <!--------- CREACION DEL DISEÑO DE LA TABLE ------------>
          <br> <!-- SALTO DE LINEA -->
          <div class="row">  <!--UNA TABLA RESPONSIVA ES DECIR SE AJUSTA DE MANERA AUTOMATICA-->
                <!-- <table class="table table-striped" > -->
                <table  class="table table-striped table-bordered nowrap" style="width:100%"id="mitabla" >
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