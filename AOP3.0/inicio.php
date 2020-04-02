<?php include_once('connections/Portal.php'); ?>
<?php
//inicio session
include('connections/session_start.php'); 

$query_CasosAbiertos = "SELECT c.*, max(log.fecha_cambio) fecha_upd_edo FROM casos c LEFT JOIN log_casos log ON c.idCaso = log.id_caso WHERE c.fechaSolucion is null GROUP BY c.idCaso ORDER BY c.idCaso DESC";
$CasosAbiertos = $Portal->query($query_CasosAbiertos);
$row_CasosAbiertos = $CasosAbiertos->fetch_assoc();

?>
<!DOCTYPE html>
<html style="zoom:90%;">
<head>
  <?php include('template/head.php'); ?>
</head>
<body class="sidebar-mini control-sidebar-open sidebar-collapse text-sm">
<div class="wrapper">
  <!-- Main Header -->
  <!-- Navbar -->
	<?php include('template/main_header.php'); ?>
  <!-- /.navbar -->

  <!-- Left Main Sidebar Container -->
  <?php $active='inicio'; $active_sub=''; ?> <?php include('template/aside_menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="inicio">Inicio</a></li>
            </ol>
          </div>
        </div>
      </div>
	  <!-- /.container-fluid -->
    </section>
	
    <!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
		<div class="row">
		  <div class="col-md-8">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Casos Abiertos</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="casos" class="table table-bordered table-hover table-striped" style="zoom:80%;width:100%;">
					<thead>
					<tr align="center">
						<th style='color:#ffffff; background-color:#17a2b8;'><center>ID CASO</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none'><center>PRODUCTO</center></th>
						<th style='color:#ffffff; background-color:#17a2b8;'><center>PRIORIDAD</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>MEDIO</center></th>
						<th style='color:#ffffff; background-color:#17a2b8;'><center>FECHA REPORTE</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>TIPO SERVICIO</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>DESCRIPCION</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>CLASE</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>CATEGORIA</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>TIPO</center></th>
						<th style='color:#ffffff; background-color:#17a2b8;'><center>CLIENTE</center></th>
						<th style='color:#ffffff; background-color:#17a2b8;'><center>ASIGNADO</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>CAUSA RAIZ</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>CATEGORIA RESOLUCION</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>REGISTRO TRABAJO</center></th>
						<th style='color:#ffffff; background-color:#17a2b8;'><center>ESTATUS</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>FEC. SOLUCION</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>HORAS SOLUCION ANS</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>REABIERTO</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>FEC. REABIERTO</center></th>
						<th style='color:#ffffff; background-color:#17a2b8; display:none;'><center>FEC. ULT. UPD.</center></th>
						<!--th style='color:#ffffff; background-color:#17a2b8;'><center>HRS</center></th-->
					</tr>
					</thead>
					<tbody>
					<?php do { ?>
					<tr align="center">
						<td style="border-color:#dedede;" id="idcaso<?php echo $row_CasosAbiertos['idCaso'];?>"><strong><button type="button" class="border-0 bg-transparent edit" value="<?php echo $row_CasosAbiertos['idCaso'];?>"/><?=$row_CasosAbiertos['idCaso'];?></strong></td>
						<td style="border-color:#dedede; display:none" id="producto<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['producto']?></td>
						<td style="border-color:#dedede;" id="prioridad<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['prioridad']?></td>
						<td style="border-color:#dedede; display:none;" id="medio<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['medio']?></td>
						<td style="border-color:#dedede;" id="fechaReporte<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['fechaReporte']?></td>
						<td style="border-color:#dedede; display:none;" id="tipoServicio<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['tipoServicio']?></td>
						<td style="border-color:#dedede; display:none;" id="descripcion<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['descripcion']?></td>
						<td style="border-color:#dedede; display:none;" id="clase<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['clase']?></td>
						<td style="border-color:#dedede; display:none;" id="categoria<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['categoria']?></td>
						<td style="border-color:#dedede; display:none;" id="tipo<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['tipo']?></td>
						<td style="border-color:#dedede;" id="cliente<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['cliente']?></td>
						<td style="border-color:#dedede;" id="grupo<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['grupo']?></td>
						<td style="border-color:#dedede; display:none;" id="causaRaiz<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['causaRaiz']?></td>
						<td style="border-color:#dedede; display:none;" id="categoriaResolucion<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['categoriaResolucion']?></td>
						<td style="border-color:#dedede; display:none;" id="registroTrabajo<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['registroTrabajo']?></td>
						<td style="border-color:#dedede;" id="estatus<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['estatus']?></td>
						<td style="border-color:#dedede; display:none;" id="fechaSolucion<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['fechaSolucion']?></td>
						<td style="border-color:#dedede; display:none;" id="horasHabil<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['horasSolANS']?> hrs.</td>
						<td style="border-color:#dedede; display:none;" id="reabierto<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['reabierto']?></td>
						<td style="border-color:#dedede; display:none;" id="fechaReabierto<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['fechaReabierto']?></td>
						<td style="border-color:#dedede; display:none;" id="fecha_upd_edo<?php echo $row_CasosAbiertos['idCaso'];?>"><?=$row_CasosAbiertos['fecha_upd_edo']?></td>
						<!--td style="border-color:#dedede;" id="fechaReabierto<!?php echo $row_CasosAbiertos['idCaso'];?>"><!?=$row_CasosAbiertos['horas']?></td-->
					</tr>
					<?php } while ($row_CasosAbiertos = mysqli_fetch_assoc($CasosAbiertos)); ?>
					</tbody>
				  </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </div>
		  
		  <div class="col-md-4">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Casos Escalados Global</h3>
              </div>
                <div class="card-body">
					<div style="height: 350px;"><embed width="100%" height="100%" src="charts/EscalamientoCasos"/></div>
                </div>
            </div>
            <!-- /.card -->
			
			<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Casos Estatus Global</h3>
              </div>
                <div class="card-body">
					<div style="height: 350px;"><embed width="100%" height="100%" src="charts/Abiertos_Resueltos"/></div>
                </div>
            </div>
            <!-- /.card -->
			
		  </div>	  
		  
		</div>		
	  </div>
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

<!-- page script -->
<?php include('tablas/modal_ActualizaCaso.php'); ?>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    //$("#casos").DataTable();
    $('#casos').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
    });
  });
</script>
<script src="tablas/js/modal_updjs.js"></script>
<script src="tablas/js/valida_estadojs.js"></script>
</body>
</html>