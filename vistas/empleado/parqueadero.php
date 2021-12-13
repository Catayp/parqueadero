<!DOCTYPE html>
<html lang="en">
<?php include_once("../../controlador/ControladorParqueadero.php");
include_once("plantillas/header.php"); ?>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <!-- Navbar -->
  <?php include_once("plantillas/navbar.php"); ?>
    <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once("plantillas/aside.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color: black">Parqueaderos</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
          <?php include_once("plantillas/cuadros.php"); ?>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Parqueaderos registrados</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12"></div>
                  <!-- /.col -->
                  <table class="table table-secondary table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">nombre</th>
                        <th scope="col">lugar</th>
                        <th scope="col">fecha</th>
                        <th scope="col">precio</th> 
                        <th scope="col">cupos totales</th>
                        <th scope="col">cupos llenos</th>
                        <th scope="col">cupos vacios</th>
                        <th scope="col">ingresar</th>
                       

                      </tr>
                    </thead>
                    <?php include_once("../../controlador/ControladorParqueadero.php");
                    $con= new ControladorParqueadero();
                    $mostrarse=$con->mostrar();
                    while ($campo=mysqli_fetch_array($mostrarse) ) {
                      $cup= $con->mostrarCupo($campo['cupos']);
                      ?>
                      <tbody>
                        <tr>
                          <th><?php echo $campo['nombre']; ?></td>
                          <td><?php echo $campo['lugar']; ?></td>
                          <td><?php echo $campo['fecha']; ?></td>
                          <td><?php echo $campo['precio']; ?></td>
                          <td><?php echo $cup->cantidadTotal; ?></td>
                          <td><?php echo $cup->llenos; ?></td>
                          <td><?php echo $cup->vacios; ?></td>
                          <td><a href="listaVehiculo.php?ingresar=<?php echo $campo['id'];?>" class="btn btn-warning">ingresar</a></td>                  
                        </tr>
                      </tbody>

                      <?php
                   
                        }
                       
                      ?>
                  </table>                  

                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
               
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->

        <!-- Main row -->
         
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   

  <!-- Main Footer -->
   <?php include_once("plantillas/footer.php"); ?>
 
 
</body>
</html>
