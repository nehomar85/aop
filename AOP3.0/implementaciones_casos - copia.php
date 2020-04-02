<?php include_once('connections/Portal.php'); ?>
<?php
//inicio session
include('connections/session_start.php');
include('tipificaciones/ConsultasOperaciones.php'); 

$query_NuevoCaso = "SELECT max(id_imp)+1 AS idcaso FROM implementaciones;";
$NuevoCaso = mysqli_query($Portal,$query_NuevoCaso);
$row_NuevoCaso = mysqli_fetch_array($NuevoCaso);

$strConsulta = "SELECT * FROM clase ORDER BY 1 ASC";
$result = $Portal->query($strConsulta);
$clase = '<option value=""></option>';
while( $fila = $result->fetch_array() )
{
	$clase.='<option value="'.$fila["id_Clase"].'">'.$fila["Clase"].'</option>';
}

$query_CasosAbiertos = "SELECT * FROM implementaciones ORDER BY FIELD(estatus,'Pendiente por Cliente','Abierto') DESC, fecha_solucion DESC, id_imp DESC";
$CasosAbiertos = $Portal->query($query_CasosAbiertos);
$row_CasosAbiertos = $CasosAbiertos->fetch_assoc();

?>
<!DOCTYPE html>
<html style="zoom:90%;">
<head>
  <?php include('template/head.php'); ?>
</head>
<body class="sidebar-mini control-sidebar-open sidebar-collapse text-sm" style="zoom: 100%;">
<div class="wrapper">
  <!-- Main Header -->
  <!-- Navbar -->
	<?php include('template/main_header.php'); ?>
  <!-- /.navbar -->

  <!-- Left Main Sidebar Container -->
    <?php $active='implementaciones'; $active_sub='implementaciones_casos'; include('template/aside_menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Implementaciones</li>
              <li class="breadcrumb-item active"><a href="implementaciones_casos">Casos</a></li>
            </ol>
          </div>
        </div>
      </div>
	  <!-- /.container-fluid -->
    </section>
	
    <!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
	  <!--div class="container-fluid h-100"-->
		<div class="row">
		<!--div class="row h-100 justify-content-center align-items-center"-->
		  <!--div class="col-md-6">
		  <!-- general form elements -->
            <!--div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nueva Implementación</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!--form role="form" id="formulario" class="needs-validation" method="post" novalidate>
                <div class="card-body">
                  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="idcaso">IMP #</label>
					<div class="col-sm-10">
					  <input type="number" class="form-control form-control-sm" id="idcaso" name="idcaso" value="<?php echo $row_NuevoCaso['idcaso']?>" required>
					  <div class="invalid-feedback">Campo obligatorio</div>
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="cliente">Cliente</label>
					<div class="col-sm-10">
					  <select id="cliente" name="cliente" class="form-control form-control-sm" required><?php echo $Cliente; ?></select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="prioridad">Prioridad</label>
					<div class="col-sm-10">
					  <select class="form-control form-control-sm" id="prioridad" name="prioridad" required><?php echo $Prioridad; ?></select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="producto">Producto</label>
					<div class="col-sm-10">
					  <select class="form-control form-control-sm" id="producto" name="producto" required><?php echo $Producto; ?></select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="medio">Escalado Por</label>
					<div class="col-sm-10">
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
					<label class="col-sm-2 col-form-label" for="fechainicio">Fecha Imp</label>
					<div class="col-sm-10">
					  <input type="datetime-local" id="fechainicio" name="fechainicio" class="form-control form-control-sm" required>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="tipoImplementa">Tipo</label>
					<div class="col-sm-10">
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
					<label class="col-sm-2 col-form-label" for="descripcion">Descripción</label>
					<div class="col-sm-10">
					  <textarea id="descripcion" name="descripcion" class="form-control form-control-sm" required></textarea>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="clase">Clase</label>
					<div class="col-sm-10">
					  <select id="clase" name="clase" class="form-control form-control-sm" required><?php echo $clase; ?></select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Categoría</label>
					<div class="col-sm-10">
					  <select id="categoria" name="categoria" class="form-control form-control-sm" required>
						<option value=""></option>
					  </select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="usuario_asignado">Asignado A</label>
					<div class="col-sm-10">
					  <select class="form-control form-control-sm" id="usuario_asignado" name="usuario_asignado" required><?php echo $Grupo; ?></select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
                </div>
                <!-- /.card-body -->
                <!--div class="card-footer">
                  <button id="Guardar" type="submit" class="btn btn-success">Registrar</button>
                  <button type="reset" class="btn btn-default">Restablecer</button>
                </div>
				<input id="usuario_log" name="usuario_log" value="<?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']?>" hidden>
              </form>
            </div>
            <!-- /.card -->
		  <!--/div-->
		  
		  <div class="col-md-8">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Record IMP</h3>
				<div class="card-tools">
                  <button type="button" name="add" id="add" data-toggle="modal" data-target="#regIMP" class="btn btn-success btn-xs add">+ Nuevo IMP</button>
                </div>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="casos" class="table table-bordered table-hover table-striped" style="zoom:80%;width:100%;">
					<thead>
					<tr align="center">
						<th style='color:#ffffff; background-color:#00417a;'><center>IMP</center></th>
						<th style='color:#ffffff; background-color:#00417a;'><center>CLIENTE</center></th>
						<th style='color:#ffffff; background-color:#00417a;'><center>PRIORIDAD</center></th>
						<th style='color:#ffffff; background-color:#00417a;'><center>PRODUCTO</center></th>
						<th style='color:#ffffff; background-color:#00417a; display:none;'><center>ESCALADO POR</center></th>
						<th style='color:#ffffff; background-color:#00417a;'><center>FECHA IMP</center></th>
						<th style='color:#ffffff; background-color:#00417a; display:none;'><center>TIPO IMP</center></th>
						<th style='color:#ffffff; background-color:#00417a; display:none;'><center>DESCRIPCION</center></th>
						<th style='color:#ffffff; background-color:#00417a; display:none;'><center>CLASE</center></th>
						<th style='color:#ffffff; background-color:#00417a; display:none;'><center>CATEGORIA</center></th>
						<th style='color:#ffffff; background-color:#00417a;'><center>ASIGNADO</center></th>
						<th style='color:#ffffff; background-color:#00417a; display:none;'><center>REGISTRO TRABAJO</center></th>
						<th style='color:#ffffff; background-color:#00417a;'><center>ESTATUS</center></th>
						<th style='color:#ffffff; background-color:#00417a; display:none;'><center>FEC. SOLUCION</center></th>
						<th style='color:#ffffff; background-color:#00417a; display:none;'><center>HORAS SOLUCION ANS</center></th>
						<th style='color:#ffffff; background-color:#00417a; display:none;'><center>FEC. ULT. UPD.</center></th>
						<!--th style='color:#ffffff; background-color:#17a2b8;'><center>HRS</center></th-->
					</tr>
					</thead>
					<tbody>
					<?php do { ?>
					<tr align="center">
						<td style="border-color:#dedede;" id="idImp<?php echo $row_CasosAbiertos['id_imp'];?>"><strong><button type="button" class="border-0 bg-transparent edit" value="<?php echo $row_CasosAbiertos['id_imp'];?>"/><?=$row_CasosAbiertos['id_imp'];?></strong></td>
						<td style="border-color:#dedede;" id="cliente<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['cliente']?></td>
						<td style="border-color:#dedede;" id="prioridad<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['prioridad']?></td>
						<td style="border-color:#dedede;" id="producto<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['producto']?></td>
						<td style="border-color:#dedede; display:none;" id="medio<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['escalado_imp']?></td>
						<td style="border-color:#dedede;" id="fechaReporte<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['fecha_imp']?></td>
						<td style="border-color:#dedede; display:none;" id="tipoServicio<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['tipo_imp']?></td>
						<td style="border-color:#dedede; display:none;" id="descripcion<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['descripcion_imp']?></td>
						<td style="border-color:#dedede; display:none;" id="clase<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['clase_imp']?></td>
						<td style="border-color:#dedede; display:none;" id="categoria<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['categoria_imp']?></td>
						<td style="border-color:#dedede;" id="grupo<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['usuario_asignado']?></td>
						<td style="border-color:#dedede; display:none;" id="registroTrabajo<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['registro_trabajo']?></td>
						<td style="border-color:#dedede;" id="estatus<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['estatus']?></td>
						<td style="border-color:#dedede; display:none;" id="fechaSolucion<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['fecha_solucion']?></td>
						<td style="border-color:#dedede; display:none;" id="horasHabil<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['horas_solucion']?> hrs.</td>
						<td style="border-color:#dedede; display:none;" id="fecha_upd_edo<?php echo $row_CasosAbiertos['id_imp'];?>"><?=$row_CasosAbiertos['fecha_upd']?></td>
						<!--td style="border-color:#dedede;" id="fechaReabierto<!?php echo $row_CasosAbiertos['id_imp'];?>"><!?=$row_CasosAbiertos['horas']?></td-->
					</tr>
					<?php } while ($row_CasosAbiertos = mysqli_fetch_assoc($CasosAbiertos)); ?>
					</tbody>
				  </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </div>
		  
		  <div class="col-md-4">
			<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Casos Implementación</h3>
              </div>
                <div class="card-body">
					<div style="height: 350px;"><embed width="100%" height="100%" src="charts/EscalamientoCasosImp"/></div>
                </div>
            </div>
		  </div>


		</div>
		
		<div id="resp"></div>
		
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
<?php include('tablas/modal_RegistrarCaso_Imp.php'); ?>
<?php include('tablas/modal_ActualizaCaso_Imp.php'); ?>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    //$("#casos").DataTable();
    $('#casos').DataTable({
      "paging": true,
      //"lengthChange": false,
	  "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	  "pageLength": 50,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script src="tablas/js/modal_updjs_Imp.js"></script>
<script src="tipificaciones/js/tipificajs.js"></script>
<script src="tipificaciones/js/registrojs_Imp.js"></script>
<script src="tablas/js/valida_estadojs.js"></script>
</body>
</html>