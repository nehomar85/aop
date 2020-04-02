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
    <?php include('template/aside_menu.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!--div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div>
	  <!-- /.container-fluid -->
    </section>
	
    <!-- Main content -->
	<section class="content">
	
	
	
	</section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
<?php include('template/footer.php'); ?>
  
  <!-- Control Sidebar -->
<!--?php include('template/control_sidebar.php'); ?-->
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<?php include('template/after_footer.php'); ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>