  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #102e4c">
    <!-- Brand Logo -->
    <div align="center">
      <!--  <img src="dist/img/AdminLTELogo.png" alt="Administrador de Parqueadero" class="brand-image img-circle elevation-3" style="opacity: .8"> --><br>
        <span class="brand-text font-weight-light">EMPLEADO PARA <br>PARQUEADERO</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/img/usuario.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php include_once("../../controlador/ControladorUsuario.php");
          $us= new ControladorUsuario(); 
          $us->sesionEmpleado();

           ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Principal
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="parqueadero.php" class="nav-link">
              <i class="nav-icon  fas fa-car"></i>
              <p>
                Parqueaderos
               </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="listaFactura.php" class="nav-link">
              <i class="nav-icon  fas fa-table"></i>
              <p>
                Facturas
               </p>
            </a>
          </li>
           
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>nuevos</p>
            </a>
          </li>
          
        </ul>
      </nav>
    </div>
  </aside>
