<?php include_once('connections/Portal.php'); ?>
<?php
//inicio session
include('connections/session_start.php');
include('tipificaciones/ConsultasOperaciones.php'); 

$query_NuevoCaso = "SELECT max(idCaso)+1 AS idcaso FROM casos;";
$NuevoCaso = mysqli_query($Portal,$query_NuevoCaso);
$row_NuevoCaso = mysqli_fetch_array($NuevoCaso);

$strConsulta = "SELECT * FROM clase ORDER BY 1 ASC";
$result = $Portal->query($strConsulta);
$clase = '<option value=""></option>';
while( $fila = $result->fetch_array() )
{
	$clase.='<option value="'.$fila["id_Clase"].'">'.$fila["Clase"].'</option>';
}

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
    <?php $active='casos_soporte'; $active_sub='registrar_caso'; include('template/aside_menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Casos Soporte</li>
              <li class="breadcrumb-item active"><a href="registrar_caso">Registro</a></li>
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
		  <div class="col-md-7">
		  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nuevo Caso</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="formulario" class="needs-validation" method="post" novalidate>
                <div class="card-body">
                  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="idcaso">Caso</label>
					<div class="col-sm-10">
					  <input type="number" class="form-control form-control-sm" id="idcaso" name="idcaso" value="<?php echo $row_NuevoCaso['idcaso']?>" required>
					  <div class="invalid-feedback">Campo obligatorio</div>
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="producto">Producto</label>
					<div class="col-sm-10">
					  <select class="form-control form-control-sm" id="producto" name="producto" required><?php echo $Producto; ?></select>
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
					<label class="col-sm-2 col-form-label" for="medio">Medio</label>
					<div class="col-sm-10">
					  <select class="form-control form-control-sm" id="medio" name="medio" required><?php echo $Medio; ?></select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="fechainicio">Fecha Reporte</label>
					<div class="col-sm-10">
					  <input type="datetime-local" id="fechainicio" name="fechainicio" class="form-control form-control-sm" required>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="tiposervicio">Tipo de Servicio</label>
					<div class="col-sm-10">
					  <select class="form-control form-control-sm" id="tiposervicio" name="tiposervicio" required><?php echo $TipoServicio; ?></select>
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
					<label class="col-sm-2 col-form-label">Categoria</label>
					<div class="col-sm-10">
					  <select id="categoria" name="categoria" class="form-control form-control-sm" required>
						<option value=""></option>
					  </select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="grupo">Asignado A</label>
					<div class="col-sm-10">
					  <select class="form-control form-control-sm" id="grupo" name="grupo" required><?php echo $Grupo; ?></select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="cliente">Cliente</label>
					<div class="col-sm-10">
					  <select id="cliente" name="cliente" class="form-control form-control-sm" required><?php echo $Cliente; ?></select>
					</div>
					<div class="invalid-feedback">Campo obligatorio</div>
				  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button id="Guardar" type="submit" class="btn btn-success">Registrar</button>
                  <button type="reset" class="btn btn-default">Restablecer</button>
                </div>
				<input id="usuario_log" name="usuario_log" value="<?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']?>" hidden>
              </form>
            </div>
            <!-- /.card -->
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
<script src="tipificaciones/js/tipificajs.js"></script>
<script src="tipificaciones/js/registrojs.js"></script>
</body>
</html>