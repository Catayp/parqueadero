<!DOCTYPE html>
<html lang="en">
 
<?php include_once("../../controlador/ControladorVehiculo.php");
               $conV= new ControladorVehiculo();       
 include_once("plantillas/header.php");
   ?>

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
            <h1 class="m-0">Vehiculos</h1>
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
                <h5 class="card-title">Vehiculos registrados</h5>

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
                  
                  <!-- /.col -->
                
                  <?php 
                    $mostrarse=$conV->mostrar();
                     
                    
                    while ($campo=mysqli_fetch_array($mostrarse)) {
                  ?>
    <div class="col-md-3 col-sm-6 mb-5 p-2">
        <div class="scard rounded">
            <div   class="card-image">
                 
                <span class="card-notify-year">2021</span>
                <img class="img-fluid" src="imagenes/<?php echo $campo['imagen']; ?>" style="width: 100%; height: 20vh" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto" >
                <span style="margin-left: 15%"class="card-detail-badge"><?php echo $campo['fecha_entrada']; ?></span>
                <span class="card-detail-badge"><?php echo $campo['placas']; ?></span>
                <span class="card-detail-badge"><button style=" border-radius: 9px; width: 25px; height: 15px; background-color:<?php echo $campo['color']; ?> "></button> </span>
            </div>
            <div class="card-body text-center">
                <div class="ad-title m-auto">
                    <h5><?php echo $campo['marcas']; ?></h5>
                </div>
                <a class="ad-btn" href="detalleVehiculo.php?id=<?php echo $campo['id_vehiculo']; ?>">Ver</a>
            </div>
        </div>
    </div>  
    <?php
      }
    ?>  
                 
                  
                  <!-- /.col -->
                </div>
                <td><a href="registrar.php" class="btn btn-primary">registrar vehiculo</a></td>   
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
               
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

                 

                  
               

             

                  <!-- fin formulario -->
                <!--</div>-->
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
               
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

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
