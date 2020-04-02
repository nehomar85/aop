<?php include_once('connections/Portal.php'); ?>
<?php
//inicio session
include('connections/session_start.php'); 

// Roles
$resultRol = $Portal->query("SELECT * FROM roles ORDER BY descripcion ASC");
$rolAdm = '<option value=""></option>';
while( $fila = $resultRol->fetch_array() )
{
	$rolAdm.='<option value="'.$fila["id"].'">'.$fila["descripcion"].'</option>';
}


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
  <?php $active='administracion'; $active_sub='admin_usuario'; ?> <?php include('template/aside_menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item">Administracion</li>
              <li class="breadcrumb-item active"><a href="admin_usuario">Usuarios</a></li>
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
		  <div class="col-md-6">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Gestión de Roles</h3>
				<div class="card-tools">
                  <button type="button" name="add" id="add" data-toggle="modal" data-target="#crear" class="btn btn-success btn-xs">+ Agregar</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				<div class="row">
					<div class="col-md-10">
					<!-- select -->
                      <div class="form-group">
						<label>Rol</label>
                        <select class="form-control form-control-sm" style="width: 100%;" id="rolAdm" name="rolAdm"><?php echo $rolAdm; ?></select>
                      </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
						  <!-- checkbox -->
						  <div class="form-group">
							<div id="result" />
						  </div>
						</div>
					</div>
				</div>
			  </div>
				
			</div>
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
<?php include('tablas/modal_EditarUsuario.php'); ?>
<?php include('tablas/modal_CrearUsuario.php'); ?>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
</body>
</html>
<script>
var select = document.getElementById('rolAdm');
select.addEventListener('change', function(){
	var selectedOption = this.options[select.selectedIndex];
	var rolName = selectedOption.text;
	var rolId = selectedOption.value;
	$.ajax({
	  type: "POST",
	  url: "tablas/a_rol.php",
	  data: {rolName,rolId},
	  cache: false,
	  success: function(data){
		$("#result").html(data);			
	  }
	});
	return false;
});
</script>