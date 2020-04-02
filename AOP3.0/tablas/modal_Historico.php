<!-- Modal -->
<div class="modal fade" id="historico" tabindex="-1" role="dialog" data-backdrop="false" style="background-color:rgba(0,0,0,0.5);">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title col-11 text-center">Histórico Caso</h5>
		<button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		<div class="container-fluid">
			<form class="form-horizontal form-label-left box-body" name="formHistory" id="formHistory" action="" method="get" onsubmit="return valida(this)">
			  <div class="form-group row">
				<label class="col-sm-2 col-form-label" for="idcaso"><h5>Caso #</h5></label>
				<div class="col-sm-2">
				  <input class="form-control border-success bg-transparent" id="eIdcaso3" readonly></input>
				</div>
			  </div>

			  <div id="data"></div>

			  <div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>
  </div>
</div>