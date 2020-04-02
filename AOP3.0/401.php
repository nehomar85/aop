<?php
//inicio session
include('connections/session_start.php'); 
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
      <div class="error-page">
        <h2 class="headline text-danger">401</h2>
        <div class="error-content">
          <br/><br/><h3><i class="fas fa-hand-paper text-danger"></i> Acceso Restringido</h3>
          <p><a href="inicio">regresar al inicio</a></p>
        </div>
      </div>
      <!-- /.error-page -->
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
</body>
</html>