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
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body class="sidebar-mini control-sidebar-open sidebar-collapse text-sm">
<div class="wrapper">
  <!-- Main Header -->
  <!-- Navbar -->
	<?php include('template/main_header.php'); ?>
  <!-- /.navbar -->

  <!-- Left Main Sidebar Container -->
  <?php $active='indicadores'; $active_sub='indicador_gerencia'; ?> <?php include('template/aside_menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Indicadores</li>
              <li class="breadcrumb-item active"><a href="indicador_gerencia">Gerencia</a></li>
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
		  <div class="col-md-12">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Disponibilidad Productos</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
					<div style="height: 350px;"><embed style="height:100%; width:100%" src="charts/DisponTotal"/></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-md-12">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Resolutividad Clientes</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
					<div style="height: 350px;"><embed style="height:100%; width:100%" src="charts/ResolClientes"/></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-md-12">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Efectividad Clientes</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
					<div style="height: 350px;"><embed style="height:100%; width:100%" src="charts/Efectividad"/></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-md-12">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Calidad Clientes</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
					<div style="height: 350px;"><embed style="height:100%; width:100%" src="charts/CalidadClientes"/></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-md-12">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Transacciones Total</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
					<div style="height: 350px;"><embed style="height:100%; width:100%" src="charts/TotalTRX"/></div>
                </div>
                <!-- /.card-body -->
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

</body>
</html>