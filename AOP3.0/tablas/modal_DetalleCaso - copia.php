<!-- Modal -->
<div class="modal fade" id="reabre" tabindex="-1" role="dialog" data-backdrop="false" style="background-color:rgba(0,0,0,0.5);">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title col-11 text-center">Detalle Caso</h5>
		<button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		<div class="container-fluid">
		<form class="form-horizontal form-label-left box-body" name="formDetails" id="formDetails" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="idcaso">Caso</label>
			<div class="col-sm-9">
			  <strong><input class="form-control form-control-sm" id="eIdcaso" name="eIdcaso" readonly></input></strong>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Producto">Producto</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eProducto" name="eProducto" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Prioridad">Prioridad</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="ePrioridad" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Medio">Medio</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eMedio" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="FechaReporte">Fecha Reporte</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eFechaReporte" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="TipoServicio">Tipo Servicio</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eTipoServicio" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Descripcion">Descripción</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eDescripcion" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Clase">Clase</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eClase" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Categoria">Categoría</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eCategoria" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Grupo">Grupo</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eGrupo" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Cliente">Cliente</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eCliente" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="CategoriaResolucion">Categoría Resolucion</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eCategoriaResolucion" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="CausaRaiz">Causa Raíz</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eCausaRaiz" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="RegistroTrabajo">Registro de Trabajo</label>
			<div class="col-sm-9">
			  <Textarea class="form-control form-control-sm" id="eRegistroTrabajo" rows="3" readonly></Textarea>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Estatus">Estatus</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eEstatus" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="FechaSolucion">Fecha Solución</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eFechaSolucion" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="HorasANS">Horas ANS</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eHorasANS" readonly></input>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="FechaReabierto">Fecha Reabierto</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eFechaReabierto" readonly></input>
			</div>
		  </div>
		  <?php if($_SESSION['reabrir'] == '1') { ?>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Reabre">Reabrir Caso</label>
			<div class="col-sm-9">
			  <select id="Reabre" name="Reabre" class="form-control form-control-sm"> 
				<option value="" selected="selected"></option>
				<option value="Si">Si</option>
			  </select>
			</div>
		  </div>
		  <div class="ln_solid"></div>
		  <div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary" value="Reabrir">Reabrir</button>
		  </div>
		  <?php } else {?>
		  <div class="ln_solid"></div>
		  <div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		  </div>
		  <?php } ?>
		  <input type="hidden" name="MM_reabre" value="formDetails" />
		</form>
		</div>
	  </div>
	  
	  <div>
		<?php

		if ((isset($_POST["MM_reabre"])) && ($_POST["MM_reabre"] == "formDetails")) {
			
			if($_POST["Reabre"] == "Si") {
				
				$Idcaso = $_POST['eIdcaso'];
				$eProducto = $_POST['eProducto'];
				$reabrirSQL = "UPDATE casos SET estatus='Abierto', fechaSolucion=NULL, reabierto='Si', fechaReabierto=now(), horasSolTotal=NULL, horasSolANS=NULL, cumpleANS=NULL WHERE idCaso= '$Idcaso'";
				$resultSQL = mysqli_query($Portal, $reabrirSQL);
				echo "<script>
						alert('Caso Reabierto Correctamente: ".$eProducto.$Idcaso."');
						location.href = 'consultar_caso';
					</script>";
			}
		}
		
		?>
	  </div>
	</div>
  </div>
</div>