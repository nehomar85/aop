  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">
	<!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="dist/img/icono.png"
           alt="AOP Web System"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AOP Web System</span>
    </a>

     <!-- Sidebar -->
    <div class="sidebar">
	  <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/icono.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?></a>
          <!--a><!--?php echo $_SESSION['nombre']; ?> <!--?php echo $_SESSION['apellido']; ?></a-->
        </div>
      </div>

      <!-- Sidebar Menu -->
	  <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        
		<!-- INICIO -->
		<li class="nav-item"><a <?php if($active=="inicio") echo 'class="nav-link active"';?> class="nav-link" href="inicio"><i class="nav-icon fas fa-home"></i><p>Inicio</p></a></li>
		
		<!-- CASOS SOPORTE -->
		<?php if($_SESSION['casos_soporte'] == '1') { ?>
		<li class="nav-item has-treeview"><a <?php if($active=="casos_soporte") echo 'class="nav-link active"';?> class="nav-link" href="#"><i class="nav-icon fas fa-edit"></i>
			<p>Casos Soporte<i class="fas fa-angle-left right"></i></p></a>
			<ul class="nav nav-treeview">
			  <li class="nav-item"><a <?php if($active_sub == "registrar_caso") echo 'class="nav-link active"';?> class="nav-link" href="registrar_caso"><i class="far fa-circle nav-icon"></i><p>Registro</p></a></li>
			  <li class="nav-item"><a <?php if($active_sub == "consultar_caso") echo 'class="nav-link active"'; ?> class="nav-link" href="consultar_caso"><i class="far fa-circle nav-icon"></i><p>Consulta</p></a></li>
            </ul>
		</li>
		<?php } ?>
		
		<!-- INDICADORES -->
		<?php if($_SESSION['indicadores'] == '1') { ?>
		<li class="nav-item has-treeview"><a <?php if($active=="indicadores") echo 'class="nav-link active"';?> class="nav-link" href="#"><i class="nav-icon fas fa-chart-line"></i>
			<p>Indicadores<i class="fas fa-angle-left right"></i></p></a>
			<ul class="nav nav-treeview">
			  <li class="nav-item"><a <?php if($active_sub == "indicador_gerencia") echo 'class="nav-link active"';?> class="nav-link" href="indicador_gerencia"><i class="far fa-circle nav-icon"></i><p>Gerencia</p></a></li>
			  <li class="nav-item"><a <?php if($active_sub == "indicador_gestion") echo 'class="nav-link active"'; ?> class="nav-link" href="indicador_gestion"><i class="far fa-circle nav-icon"></i><p>Gestión</p></a></li>
            </ul>
		</li>
		<?php } ?>
		
		<!-- MONITOREO -->
		<?php if($_SESSION['monitoreo'] == '1') { ?>
		<li class="nav-item has-treeview"><a <?php if($active=="monitoreo") echo 'class="nav-link active"';?> class="nav-link" href="#"><i class="nav-icon fas fa-tachometer-alt"></i>
			<p>Monitoreo<i class="fas fa-angle-left right"></i></p></a>
			<ul class="nav nav-treeview">
			  <li class="nav-item"><a <?php if($active_sub == "monitoreo1") echo 'class="nav-link active"';?> class="nav-link" href="#"><i class="far fa-circle nav-icon"></i><p>Usuarios</p></a></li>
			  <li class="nav-item"><a <?php if($active_sub == "monitoreo2") echo 'class="nav-link active"'; ?> class="nav-link" href="#"><i class="far fa-circle nav-icon"></i><p>Clientes</p></a></li>
            </ul>
		</li>
		<?php } ?>
		
		<!-- ADMIN USERS -->
		<?php if($_SESSION['users_admin'] == '1') { ?>
		<li class="nav-item has-treeview"><a <?php if($active=="administracion") echo 'class="nav-link active"';?> class="nav-link" href="#"><i class="nav-icon fas fa-users-cog"></i>
			<p>Administración<i class="fas fa-angle-left right"></i></p></a>
			<ul class="nav nav-treeview">
			  <li class="nav-item"><a <?php if($active_sub == "admin_usuario") echo 'class="nav-link active"';?> class="nav-link" href="admin_usuario"><i class="far fa-circle nav-icon"></i><p>Usuarios</p></a></li>
			  <li class="nav-item"><a <?php if($active_sub == "admin_cliente") echo 'class="nav-link active"'; ?> class="nav-link" href="#"><i class="far fa-circle nav-icon"></i><p>Clientes</p></a></li>
            </ul>
		</li>
		<?php } ?>
		
		<!-- CONFIGURACION -->
		<?php if($_SESSION['users_admin'] == '1') { ?>
		<li class="nav-item has-treeview"><a <?php if($active=="configuracion") echo 'class="nav-link active"';?> class="nav-link" href="#"><i class="nav-icon fas fa-tools"></i>
			<p>Configuración<i class="fas fa-angle-left right"></i></p></a>
			<ul class="nav nav-treeview">
			  <li class="nav-item"><a <?php if($active_sub == "cnonfiguracion") echo 'class="nav-link active"';?> class="nav-link" href="#"><i class="far fa-circle nav-icon"></i><p>Usuarios</p></a></li>
			  <li class="nav-item"><a <?php if($active_sub == "admin_cliente2") echo 'class="nav-link active"'; ?> class="nav-link" href="#"><i class="far fa-circle nav-icon"></i><p>Clientes</p></a></li>
            </ul>
		</li>
		<?php } ?>
        
		
		
      </ul>
      </nav>
	  <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>