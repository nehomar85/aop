<?php include_once('connections/Portal.php'); ?>
<?php
//inicio session
include('connections/session_start.php'); 

// Estado user BD
$sql = "SELECT u.*, r.descripcion rol,
			CASE u.estado
			  when 1 then 'ACTIVO'
			  when 0 then 'INACTIVO'    
			END estado_des
		FROM users u, roles r WHERE u.rol_id = r.id";
$sqlUser = $Portal->query($sql);
$usr = $sqlUser->fetch_assoc();

$status = array('1' => 'badge bg-success', '0' => 'badge bg-secondary');

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
		  <div class="col-md-12">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Usuarios Registrados</h3>
				<div class="card-tools">
                  <button type="button" name="add" id="add" data-toggle="modal" data-target="#crear" class="btn btn-success btn-xs add">+ Agregar</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		
				<!--form-->
				  <table id="usuarios" class="table table-bordered table-hover table-striped responsive nowrap" style="zoom:95%;width:100%;">
					<thead>
					  <tr>
						<th style="display:none">Id</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Correo</th>
						<th>Fecha de Registro</th>
						<th>Rol</th>
						<th>Estado</th>
						<th>Acciones</th>
					  </tr>
					</thead>
					<tbody>
					<?php do { ?>
					  <tr>
						<td id="iduser<?php echo $usr['id'];?>" style="display:none"><?php echo $usr['id']; ?></td>
						<td id="nombre<?php echo $usr['id']; ?>"><?php echo $usr['nombre']; ?></td>
						<td id="apellido<?php echo $usr['id']; ?>"><?php echo $usr['apellido']; ?></td>
						<td id="email<?php echo $usr['id'] ?>"><?php echo $usr['email']; ?></td>
						<td id="fec_creacion<?php echo $usr['id']; ?>"><?php echo date_format(new DateTime($usr['created_at']), 'd-m-Y'); ?></td>
						<td id="rol<?php echo $usr['id']; ?>"><?php echo $usr['rol']; ?></td>
						<td id="estado<?php echo $usr['id']; ?>"><span class="<?php echo $status[$usr['estado']]; ?>"><?php echo $usr['estado_des']; ?></span></td>
						<td>
						  	<button class='border-0 bg-transparent fa fa-pencil-alt text-primary edit' title="Editar" value="<?php echo $usr['id']; ?>" />
							<!--button type="button" class="border-0 bg-warning edit" value="#"/-->
						  <?php
							if($_SESSION['id'] != $usr['id']){
						  ?>
							<button class='border-0 bg-transparent fa fa-trash text-danger delete' title="Eliminar" value="<?php echo $usr['id'];?>" />
						  <?php } ?>
						</td>
					  </tr>
					<?php } while ($usr = mysqli_fetch_assoc($sqlUser)); ?>
					</tbody>
				  </table>
				<!--/form-->
				
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
$(document).ready(function(){
	
	$(document).on('click', '.add', function(){
		// Upon load..
		//window.addEventListener('load', () => {
		  // Grab all the forms
		  var forms = document.getElementsByClassName('needs-validation');
		  // Iterate over each one
		  for (let form of forms) {
			// Add a 'submit' event listener on each one
			form.addEventListener('submit', (evt) => {
			  // check if the form input elements have the 'required' attribute  
			  if (!form.checkValidity()) {
				evt.preventDefault();
				evt.stopPropagation();
				//console.log('Bootstrap will handle incomplete form fields');
				//alert('Por favor complete todos los campos obligatorios del formulario');
			  } else {
				// Since form is now valid, prevent default behavior..
				evt.preventDefault();
				//console.info('All form fields are now valid...');
				var url = "tablas/crud/user_add";
				$.ajax({                        
				   type: "POST",                 
				   url: url,                     
				   data: $("#formRegUser").serialize(), 
				   success: function(data){
					 alert(data);
					 location.href='admin_usuario';
				   }
				});
				return false;
			  }      
			  form.classList.add('was-validated');
			});
		  }
		//});
	});
	
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		var iduser=$('#iduser'+id).text();
		var nombre=$('#nombre'+id).text();
		var apellido=$('#apellido'+id).text();
		var email=$('#email'+id).text();
		var rol=$('#rol'+id).text();
		var estado_des=$('#estado'+id).text();
		
		if (estado_des == 'ACTIVO'){
			var estado='1';
		}else{
			var estado='0';
		}
		
		$('#editar').modal('show');
		$('#iduser2').val(iduser);
		$('#nombre2').val(nombre);
		$('#apellido2').val(apellido);
		$('#email2').val(email);
		$('#rol2').val(rol);
		$('#estado2').val(estado);
		
		// Upon load..
		//window.addEventListener('load', () => {
		  // Grab all the forms
		  var forms = document.getElementsByClassName('needs-validation');
		  // Iterate over each one
		  for (let form of forms) {
			// Add a 'submit' event listener on each one
			form.addEventListener('submit', (evt) => {
			  // check if the form input elements have the 'required' attribute  
			  if (!form.checkValidity()) {
				evt.preventDefault();
				evt.stopPropagation();
				//console.log('Bootstrap will handle incomplete form fields');
				//alert('Por favor complete todos los campos obligatorios del formulario');
			  } else {
				// Since form is now valid, prevent default behavior..
				evt.preventDefault();
				//console.info('All form fields are now valid...');
				var url = "tablas/crud/user_update";
				$.ajax({                        
				   type: "POST",                 
				   url: url,                     
				   data: $("#formUpdUser").serialize(), 
				   success: function(data){
					 alert(data);
					 location.href='admin_usuario';
				   }
				});
				return false;
			  }      
			  form.classList.add('was-validated');
			});
		  }
		//});
	});
	
	$(document).on('click', '.delete', function(){
		var id=$(this).val();
		var iduser=$('#iduser'+id).text();
		$.ajax({
		  type: "POST",
		  url: "tablas/crud/user_delete",
		  data: {iduser},
		  success: function(data){
			location.href='admin_usuario';
			alert(data);
		  }
		});
	});
	
});
</script>