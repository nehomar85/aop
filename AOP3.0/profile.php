<?php include_once('connections/Portal.php'); ?>
<?php
//inicio session
include('connections/session_start.php'); 

$query_CasosAbiertos = "SELECT * FROM casos WHERE fechaSolucion IS NULL ORDER BY idCaso DESC";
$CasosAbiertos = $Portal->query($query_CasosAbiertos);
$row_CasosAbiertos = $CasosAbiertos->fetch_assoc();

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
  <?php $active='inicio'; $active_sub=''; ?> <?php include('template/aside_menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="profile">Perfil</a></li>
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
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="dist/img/user2-160x160.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']?></h3>

                <p class="text-muted text-center">Software Engineer</p>
				
                <!--input type="file" class="custom-file"/-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar</a></li>
                  <!--li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li-->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control form-control-sm" id="inputName" value="<?php echo $_SESSION['nombre']; ?>" readonly >
                        </div>
                      </div>
					  <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Apellido</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control form-control-sm" id="inputName2" value="<?php echo $_SESSION['apellido']; ?>" readonly >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control form-control-sm" id="inputEmail" value="<?php echo $_SESSION['apellido']; ?>" readonly >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Nuevo Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control form-control-sm" id="inputPassword" placeholder="Nuevo Password">
                        </div>
                      </div>
					  <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Confirmar Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control form-control-sm" id="inputPassword2" placeholder="Confirmar Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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

</body>
</html>