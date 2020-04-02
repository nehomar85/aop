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
		<form class="form-horizontal form-label-left box-body" name="formDetails" id="formDetails" method="get" onsubmit="return reabre(this)">
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
			  <select id="Reabre" name="Reabre" class="form-control form-control-sm" onChange="validaEstado(this)" > 
				<option value="" selected="selected"></option>
				<option value="Si">Si</option>
			  </select>
			</div>
		  </div>
		  <div class="form-group row" id="fechaLastUpd" style="display:none;">
			<label class="col-sm-3 col-form-label text-danger" for="fechaLastUpd">Último Update</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm text-danger" id="eFechaLastUpd2" name="fechaLastUpd" readonly ></input>
			</div>
		  </div>
		  <div class="form-group row" id="fechaReapertura" style="display:none;">
			<label class="col-sm-3 col-form-label" for="fechaReapertura">Fecha Cambio</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="eFechaReapertura" type="datetime-local"  name="fechaReapertura" ></input>
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
		  <input id="usuarioReg_log" name="usuarioReg_log" value="<?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']?>" hidden>
		</form>
		</div>
	  </div>
	</div>
  </div>
</div>
<script>
function fReapertura(sel) {
	if (sel.value=="Si"){
		divC = document.getElementById("fechaReapertura");
		divC.style.display = "";
		divT = document.getElementById("fechaLastUpd");
		divT.style.display = "";
		divT = document.getElementById("fechaEstado");
		divT.style.display = "none";
	}else if (sel.value==""){
		divC = document.getElementById("fechaSolucion");
		divC.style.display="none";
		divT = document.getElementById("fechaEstado");
		divT.style.display = "none";
	}else{
		divC = document.getElementById("fechaSolucion");
		divC.style.display = "none";
		divT = document.getElementById("fechaEstado");
		divT.style.display = "";
		divT = document.getElementById("fechaLastUpd");
		divT.style.display = "";
		
	}
}

function reabre(f) {
	var eIdcaso = $("#eIdcaso").val();
	var eProducto = $("#eProducto").val();
	var ok = true;
	var redir = 1;
	  var msg = "";
	
	if(f.elements["Reabre"].value == "Si"){
	  msg = "Caso Reabierto Correctamente";
	  $.ajax({
		type: "POST",
		url: "tablas/upd_reabrir_caso.php",
		data: {eIdcaso,eProducto},
		success: function(data){
			$("#reabre").modal("hide");
			msg = "Caso Reabierto Correctamente";
			redir = 1;
		}
	  });
	  ok = false;
	}else{
	  msg = "No hay reapertura";
	  redir = 0;
	  ok = false;
	}
	
	if(ok == false){
	  if(redir == 0){
		alert(msg);
	  }else{
		alert(msg);
		var Idcaso = $("#Idcaso").val();
		var Estatus = $("#Estatus").val();
		var Cliente = $("#Cliente").val();
		var Usuario = $("#Usuario").val();
		var Prioridad = $("#Prioridad").val();
		var rangofechas = $("#rangofechas").val();
		var Producto = $("#Producto").val();
		$.ajax({
		  type: "POST",
		  url: "tablas/rsl_consulta_caso.php",
		  data: {Idcaso,Estatus,Cliente,Usuario,Prioridad,rangofechas,Producto},
		  success: function(data){
			$.getScript("tablas/js/buttons_exportjs.js");
			$("#result").html(data);
		  }
		});
	  }
	}
	return ok;
}
</script>
