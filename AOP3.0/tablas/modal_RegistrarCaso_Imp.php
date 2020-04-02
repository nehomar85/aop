<?php include_once('tipificaciones/ConsultasOperaciones.php');?>
<!-- Modal -->
<div class="modal fade" id="regIMP" tabindex="-1" role="dialog" data-backdrop="false" style="background-color:rgba(0,0,0,0.5);">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title col-11 text-center">Nueva Implementación</h5>
		<button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		<div class="container-fluid">
		<form role="form" id="formulario" class="needs-validation" method="post" novalidate>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="idcaso">IMP #</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control form-control-sm" id="idcaso" name="idcaso" value="<?php echo $row_NuevoCaso['idcaso']?>" required>
			  <div class="invalid-feedback">Campo obligatorio</div>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="idcaso22">IMP #</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control form-control-sm" id="idcaso22" name="idcaso22" />
			  <div class="invalid-feedback">Campo obligatorio</div>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="cliente">Cliente</label>
			<div class="col-sm-9">
			  <select id="cliente22" name="cliente22" class="form-control form-control-sm" required><?php echo $Cliente; ?></select>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="prioridad">Prioridad</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="prioridad" name="prioridad" required><?php echo $Prioridad; ?></select>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="producto">Producto</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="producto" name="producto" required><?php echo $Producto; ?></select>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="medio">Escalado Por</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="medio" name="medio" required>
				<option value="" selected></option>
				<option value="Cliente">Cliente</option>
				<option value="Gerente de Proyecto">Gerente de Proyecto</option>
				<option value="Infraestructura">Infraestructura</option>
				<option value="Ingenieria">Ingenieria</option>
			  </select>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="fechainicio">Fecha Imp</label>
			<div class="col-sm-9">
			  <input type="datetime-local" id="fechainicio" name="fechainicio" class="form-control form-control-sm" required>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="tipoImplementa">Tipo</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="tipoImplementa" name="tipoImplementa" required>
				<option value="" selected></option>
				<option value="Control de Cambio">Control de Cambio</option>
				<option value="Implementacion">Implementacion</option>
				<option value="Paso Produccion">Paso a Produccion</option>
				<option value="Seguimiento">Seguimiento</option>
			  </select>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="descripcion">Descripción</label>
			<div class="col-sm-9">
			  <textarea id="descripcion" name="descripcion" class="form-control form-control-sm" required></textarea>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="clase">Clase</label>
			<div class="col-sm-9">
			  <select id="clase" name="clase" class="form-control form-control-sm" required><?php echo $clase; ?></select>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label">Categoría</label>
			<div class="col-sm-9">
			  <select id="categoria" name="categoria" class="form-control form-control-sm" required>
				<option value=""></option>
			  </select>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="usuario_asignado">Asignado A</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="usuario_asignado" name="usuario_asignado" required><?php echo $Grupo; ?></select>
			</div>
			<div class="invalid-feedback">Campo obligatorio</div>
		  </div>
		  <div class="ln_solid"></div>
		  <div class="modal-footer justify-content-between">
			<button type="reset" class="btn btn-default">Restablecer</button>
			<button id="Guardar" type="submit" class="btn btn-success">Registrar</button>
		  </div>
		  <input id="usuario_log" name="usuario_log" value="<?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']?>" hidden>
		</form>
		</div>
	  </div>
	</div>
  </div>
</div>
<script>
$.getScript("tablas/js/update_cierrejs.js");
$.getScript("tablas/js/valida_fechajs.js");
$.getScript("tipificaciones/js/tipificajs_modal.js");
</script>
