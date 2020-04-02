<?php include_once('connections/Portal.php'); ?>
<?php 
//inicio session
include('connections/session_start.php'); 
include('tipificaciones/ConsultasOperaciones.php'); 
?>
<!DOCTYPE html>
<html style="zoom:90%;">
<head>
  <?php include('template/head.php'); ?>
  <link href="dist/css/timeline.css" rel="stylesheet">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Datatable -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- JS post ajax -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body class="sidebar-mini control-sidebar-open sidebar-collapse text-sm">
<div class="wrapper">
  <!-- Main Header -->
  <!-- Navbar -->
	<?php include('template/main_header.php'); ?>
  <!-- /.navbar -->

  <!-- Left Main Sidebar Container -->
    <?php $active='casos_soporte'; $active_sub='consultar_caso'; include('template/aside_menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Casos Soporte</li>
              <li class="breadcrumb-item active"><a href="consultar_caso">Consultar</a></li>
            </ol>
          </div>
        </div>
      </div>
	  <!-- /.container-fluid -->
    </section>
	
    <!-- Main content -->
	<section class="content">
	<form id="frmSearch">
	  <!-- SELECT -->
      <div class="container-fluid">
		<div class="row">
		  <div class="col-md-12">
			<!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Consultar Casos</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
				  <div class="row">
					<div class="col-md-3">
					  <div class="form-group">
						<label>Caso #</label>
						<input class="form-control form-control-sm" name="Idcaso" type="number" id="Idcaso" placeholder="eg. 12345" max="9999">
					  </div>
					  <!-- /.form-group -->
					  <div class="form-group">
						<label>Estatus</label>
						<select class="form-control form-control-sm" style="width: 100%;" id="Estatus" name="Estatus"><?php echo $Estatus; ?></select>
					  </div>
					  <!-- /.form-group -->
					</div>
					<!-- /.col -->
					<div class="col-md-3">
					  <div class="form-group">
						<label>Cliente</label>
						<select class="form-control form-control-sm" style="width: 100%;" id="Cliente" name="Cliente"><?php echo $Cliente; ?></select>
					  </div>
					  <!-- /.form-group -->
					  <div class="form-group">
						<label>Usuario</label>
						<select class="form-control form-control-sm" style="width: 100%;" id="Usuario" name="Usuario"><?php echo $Grupo; ?></select>
					  </div>
					  <!-- /.form-group -->
					</div>
					<!-- /.col -->
					<div class="col-md-3">
					  <div class="form-group">
						<label>Prioridad</label>
						<select class="form-control form-control-sm" style="width: 100%;" id="Prioridad" name="Prioridad"><?php echo $Prioridad; ?></select>
					  </div>
					  <!-- /.form-group -->
					  <!-- Date range -->
						<div class="form-group">
						  <label>Rango de Fechas:</label>
						  <div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
							</div>
							<input type="text" class="form-control form-control-sm float-right" id="rangofechas" name="rangofechas"/>
						  </div>
						  <!-- /.input group -->
						</div>
					  <!-- /.form-group -->
					</div>
					<!-- /.col -->
					<div class="col-md-3">
					  <div class="form-group">
						<label>Producto</label>
						<select class="form-control form-control-sm" style="width: 100%;" id="Producto" name="Producto"><?php echo $Producto; ?></select>
					  </div>
					  <!-- /.form-group -->
					  <div class="form-group">
						</br>
						<button id="submit" type="submit" class="btn btn-success" value="submit">Buscar</button>
						<button type="reset" class="btn btn-default">Restablecer</button>
					  </div>
					  <!-- /.form-group -->
					</div>
					<!-- /.col -->
				  </div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
      <!-- /.box -->
	</form>
	<!--div class="container-fluid">
	  <div class="row">
		<div class="col-md-12">
		  <div class="card card-primary">
			<div class="card-header"><h3 class="card-title">Resultado búsqueda:</h3></div-->
			<div id="result"></div>
		  <!--/div>
		</div>
	  </div>
	</div-->

	</section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
<?php include('template/footer.php'); ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<?php include('template/after_footer.php'); ?>
<?php include('tablas/modal_DetalleCaso.php'); ?>
<?php include('tablas/modal_ActualizaCaso.php'); ?>
<?php include('tablas/modal_Historico.php'); ?>
<!-- DATATABLES -->
<!--script src="https://code.jquery.com/jquery-3.3.1.js"></script-->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<!-- DATE RANGE -->
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

</body>
</html>
<script>
$(document).ready(function(){
	$(document).on('click', '.record', function(){
		var id=$(this).val();
		var idcasohist=$('#idcaso'+id).text();
		$('#historico').modal('show');
		$('#eIdcaso3').val(idcasohist);
		$.ajax({
			type: "GET",
			url: 'tablas/tipificaciones/HistoricoCaso.php',
			idcasohist:idcasohist,
			data:{idcasohist},
			success: function(data) {
				$("#data").html(data);
			}
		});
	});
});
</script>
<script>
$.getScript("tablas/js/modal_updjs.js");
$.getScript("tablas/js/rango_fechasjs.js");
$.getScript("tablas/js/valida_estadojs.js");
</script>
<script>
$(document).ready(function(){
	$("#submit").click(function(){
		var Idcaso = $("#Idcaso").val();
		var Estatus = $("#Estatus").val();
		var Cliente = $("#Cliente").val();
		var Usuario = $("#Usuario").val();
		var Prioridad = $("#Prioridad").val();
		var rangofechas = $("#rangofechas").val();
		var Producto = $("#Producto").val();
		$.ajax({
		  type: "POST",
		  url: "tablas/rsl_consulta_caso.php",
		  data: {Idcaso,Estatus,Cliente,Usuario,Prioridad,rangofechas,Producto},
		  cache: false,
		  success: function(data){
			$.getScript("tablas/js/buttons_exportjs.js");
			$("#result").html(data);
		  }
		});
		return false;
	});
});
</script>