<!DOCTYPE html>
<html lang="en">
<?php include_once("plantillas/header.php"); ?>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <!-- Navbar -->
  <?php include_once("plantillas/navbar.php"); ?>
    <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once("plantillas/aside.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #d6d8db;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color: black">Empleados</h1>
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
            <div class="card"style="background-color: #ffffff; color: black">
              <div class="card-header">
                <h5 class="card-title">Empleados registrados</h5>

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
                        <th scope="col">edad</th>
                        <th scope="col">gmail</th>
                        <th scope="col">telefono</th>
                        <th scope="col">eliminar</th>
                      </tr>
                    </thead>
                    <?php include_once("../../controlador/ControladorUsuario.php");
                    $con= new ControladorUsuario();
                    $mostrarse=$con->mostrar();
                    while ($campo=mysqli_fetch_array($mostrarse) ) {
                      ?>
                      <tbody>
                        <tr>

                    
                          <th><?php echo $campo['nombre']; ?></td>
                          <td><?php echo $campo['edad']; ?></td>
                          <td><?php echo $campo['gmail']; ?></td>
                          <td><?php echo $campo['telefono']; ?></td>
                          <td><a href="../../controlador/ControladorUsuario.php?eliminar=<?php echo $campo['id'];?>" class="btn btn-danger">eliminar</a></td>                          
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
