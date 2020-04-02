<?php include_once('tipificaciones/ConsultasOperaciones.php');?>
<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" data-backdrop="false" style="background-color:rgba(0,0,0,0.5);">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title col-11 text-center">Actualizar Caso</h5>
		<button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		<div class="container-fluid">
		<form class="form-horizontal form-label-left box-body" id="formModifica" method="get" onsubmit="return valida(this)">
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="idcaso">Caso</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eIdcaso2" name="idcaso" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Producto">Producto</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eProducto2" name="producto" ><?php echo $Producto; ?></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Prioridad">Prioridad</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="ePrioridad2"  name="prioridad" ><?php echo $Prioridad; ?></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Medio">Medio</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eMedio2" name="medio" ><?php echo $Medio; ?></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="FechaReporte">Fecha Reporte</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eFechaReporte2" readonly name="fechaReporte" ></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="TipoServicio">Tipo Servicio</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eTipoServicio2" name="tipoServicio" ><?php echo $TipoServicio; ?></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Descripcion">Descripción</label>
			<div class="col-sm-9">
			  <Textarea class="form-control form-control-sm" id="eDescripcion2" name="descripcion"></Textarea>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Clase">Clase</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eClase2" name="clase" ><?php echo $Clase; ?></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Categoria">Categoría</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eCategoria2" name="categoria" ><?php echo $Categoria; ?></select>
			</div>
		  </div>
		  
		  <?php if($_SESSION['cambio_usuario'] == '1') { ?>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Grupo">Grupo</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eGrupo2"><?php echo $Grupo; ?></select>
			</div>
		  </div>
		  <?php } else {?>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Grupo">Grupo</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eGrupo2" readonly name="grupo"  />
			</div>
		  </div>
		  <?php } ?>
		  
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Cliente">Cliente</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eCliente2"  name="cliente" ><?php echo $Cliente; ?></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="CategoriaResolucion">Ctg. Resolucion</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eCategoriaResolucion2" name="categoriaResolucion" ><?php echo $CategoriaResolucion; ?></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="CausaRaiz">Causa Raíz</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eCausaRaiz2" name="causaRaiz"></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="RegistroTrabajo">Registro de Trabajo</label>
			<div class="col-sm-9">
			  <Textarea class="form-control form-control-sm" id="eRegistroTrabajo2"  name="registroTrabajo" ></Textarea>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Estatus">Estatus</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="eEstatus2" onChange="validaEstado(this)" required  name="estatus" ><?php echo $Estatus; ?></select>
			</div>
		  </div>	  
		  <div class="form-group row" id="fechaLastUpd" style="display:none;">
			<label class="col-sm-3 col-form-label text-danger" for="fechaLastUpd">Último Update</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm text-danger" id="eFechaLastUpd" name="fechaLastUpd" readonly ></input>
			</div>
		  </div>
		  <div class="form-group row" id="fechaEstado" style="display:none;">
			<label class="col-sm-3 col-form-label" for="FechaEstado">Fecha Cambio</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eFechaEstado2" type="datetime-local"  name="fechaEstado" ></input>
			</div>
		  </div>
		  <div class="form-group row" id="fechaSolucion" style="display:none;">
			<label class="col-sm-3 col-form-label" for="FechaSolucion">Fecha Solución</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eFechaSolucion2" type="datetime-local"  name="fechaSolucion" ></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Reabierto">Reabierto</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eReabierto2" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="FechaReabierto">Fecha Reabierto</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eFechaReabierto2" readonly></input>
			</div>
		  </div>
		  <div class="ln_solid"></div>
		  <div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-success">Actualizar</button>
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