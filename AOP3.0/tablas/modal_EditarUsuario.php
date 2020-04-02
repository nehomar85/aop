<?php 
	
include('connections/Portal.php');

$strRol = "SELECT * FROM roles ORDER BY descripcion ASC";
$resultRol = $Portal->query($strRol);
$rolUser = '<option value=""></option>';
while( $fila = $resultRol->fetch_array() )
{
	$rolUser.='<option value="'.$fila["descripcion"].'">'.$fila["descripcion"].'</option>';
}

?>
<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" data-backdrop="false" style="background-color:rgba(0,0,0,0.5);">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title col-11 text-center">Actualizar Usuario</h5>
		<button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		<div class="container-fluid">
		<form class="form-horizontal form-label-left box-body needs-validation" id="formUpdUser" novalidate >
		  <!--div class="form-group row">
			<label class="col-sm-3 col-form-label" for="IdUser">Id</label>
			<div class="col-sm-9"-->
			  <input class="form-control form-control-sm" id="iduser2" name="iduser" required hidden />
			<!--/div>
		  </div-->
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Nombre">Nombre</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="nombre2" name="nombre" required />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Apellido">Apellido</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="apellido2"  name="apellido" required />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Email">Correo</label>
			<div class="col-sm-9">
			  <input type="email" class="form-control form-control-sm" id="email2" name="email" required />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Rol">Rol</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="rol2" name="rol" required ><?php echo $rolUser; ?></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Estado">Estado</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="estado2" name="estado" required >
				<option value=""></option>
				<option value="1">Activo</option>
				<option value="0">Inactivo</option>
			  </select>
			</div>
		  </div>
		  <div class="ln_solid"></div>
		  <div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button id="updUser" type="submit" class="btn btn-success eviarUser">Actualizar</button>
		  </div>
		  <input class="form-control form-control-sm" id="updateUser" name="updateUser" hidden />
		</form>
		</div>
	  </div>
	</div>
  </div>
</div>