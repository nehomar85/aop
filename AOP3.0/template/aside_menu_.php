  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

     <!-- Sidebar -->
    <div class="sidebar">
	  <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/icono.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nehomar Herrera</a>
          <!--a><!--?php echo $_SESSION['nombre']; ?> <!--?php echo $_SESSION['apellido']; ?></a-->
        </div>
      </div>

      <!-- Sidebar Menu -->
	  <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
		<!-- INICIO -->
		  <li class="nav-item">
            <a href="../gallery.html" class="nav-link active">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
		<li class="nav-item"><a class="nav-link active" href="inicio"><i class="nav-icon fas fa-home"></i><p>Inicio</p></a></li>
        
		<!-- CASOS SOPORTE -->
		<?php if($_SESSION['casos_soporte'] == '1') { ?>
		<li <?php if($active == "casos_soporte"){ echo 'class="treeview active"';}else echo 'class="treeview"'; ?>>
          <a href="#"><i class="fa fa-edit"></i> <span>Casos Soporte</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == "registrar_caso") echo 'class="active"'; ?>><a href="registrar_caso">Registro</a></li>
            <li <?php if($active_sub == "consultar_caso") echo 'class="active"'; ?>><a href="consultar_caso">Consulta</a></li>
          </ul>
        </li>
		<?php } ?>
		
		<!-- MONITOREO -->
		<?php if($_SESSION['monitoreo'] == '1') { ?>
        <li <?php if($active == "monitoreo"){ echo 'class="treeview active"';}else echo 'class="treeview"'; ?>>
          <a href="#"><i class="fa fa-dashboard"></i> <span>Monitoreo</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == "monitoreo_programadas") echo 'class="active"'; ?>><a href="monitoreo_programadas.php">Programadas</a></li>
            <li <?php if($active_sub == "monitoreo_unicavez") echo 'class="active"'; ?>><a href="monitoreo_unicavez.php">Única Vez</a></li>
            <li <?php if($active_sub == "monitoreo_noincluidas") echo 'class="active"'; ?>><a href="monitoreo_noincluidas.php">No Incluidas</a></li>
            <li <?php if($active_sub == "monitoreo_factura") echo 'class="active"'; ?>><a href="monitoreo_factura.php">Factura FE</a></li>
          </ul>
        </li>
		<?php } ?>
		
		<!-- INDICADORES -->
		<?php if($_SESSION['indicadores'] == '1') { ?>
        <li <?php if($active == "indicadores") echo 'class="active"'; ?>><a href="indicadores.php"><i class="fa fa-line-chart"></i> <span>Indicadores</span></a></li>
		<?php } ?>
		
		<!-- BITACORAS -->
		<?php if($_SESSION['bitacoras'] == '1') { ?>
        <li <?php if($active == "bitacoras"){ echo 'class="treeview active"';}else echo 'class="treeview"'; ?>>
          <a href="#"><i class="fa fa-table"></i> <span>Bitácoras</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == "bitacora_archivos") echo 'class="active"'; ?>><a href="bitacora_archivos.php">Bitácora Archivos</a></li>
            <li <?php if($active_sub == "bitacora_produccion") echo 'class="active"'; ?>><a href="bitacora_produccion.php">Controles de Cambios</a></li>
          </ul>
        </li>
		<?php } ?>
		
		<!-- TRACKER -->
		<?php if($_SESSION['tracker'] == '1') { ?>
		<li <?php if($active == "tracker") echo 'class="active"'; ?>><a href="tracker.php"><i class="fa fa-check"></i> <span>Tracker</span></a></li>
		<!--li><a href="#"><i class="fa fa-file-o"></i> <span>Tracker</span></a></li-->
		<?php } ?>
		
		<!-- PROCESOS -->
		<?php if($_SESSION['procesos'] == '1') { ?>
        <li <?php if($active == "procesos"){ echo 'class="treeview active"';}else echo 'class="treeview"'; ?>>
          <a href="#"><i class="fa fa-book"></i> <span>Procesos</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == "operaciones") echo 'class="active"'; ?>><a href="#">Operaciones</a></li>
            <li <?php if($active_sub == "formatos") echo 'class="active"'; ?>><a href="#">Formatos</a></li>
            <li <?php if($active_sub == "pci") echo 'class="active"'; ?>><a href="#">PCI</a></li>
          </ul>
        </li>
		<?php } ?>
		
      </ul>
      </nav>
	  <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>