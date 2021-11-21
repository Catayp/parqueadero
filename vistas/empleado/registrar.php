<!DOCTYPE html>
<html lang="en">
<?php include_once("../../controlador/ControladorVehiculo.php");
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
            <h1 class="m-0">Registrar Vehiculo</h1>
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
                <h5 class="card-title">Registrar Vehiculo</h5>
                
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.inicio formulario -->
              <div class="card-body formulario">
                <div class="row">
                  <div class="col-2"></div>
                  <div class="col-8">
                    <h1>Formulario de registro</h1>
                    <!--inicio de columnas -->
                    <form action="../../controlador/ControladorVehiculo.php" method="POST" enctype="multipart/form-data">

                      

                      <div class="row fila">    
                        <div class="col-9" >
                          <input type="text"  name="placas" autocomplete="off" placeholder="Placas del Vehiculo" class="columna">
                        </div>              
                        <div class="col-1">
                          <label style="">color:</label>
                   
                        </div>
                        <div class="col-2">
                        <input type="color" name="color" autocomplete="off" placeholder="color" style="width: 50%;border-radius: 10px">
                   
                        </div>
                              
                      </div>

                      <div class="row fila">                  
                        <div class="col-12">
                          <input type="text" name="marca" autocomplete="off" placeholder="Marca del Vehiculo " class="columna">
                        </div>
        
                      </div> 

                       <div class="row fila">                  
                        <div class="col-12">
                          <textarea style="height: 150px" name="descripcion" autocomplete="off" placeholder="descripcion" class="columna"></textarea>
                        </div>
        
                      </div> 
                      <div class="row fila">                  
                        <div class="col-12">
                          <input type="file" name="imagen" placeholder="imagen del Vehiculo" style="padding-top: 10px;  height: 120%; background-color: white;color: black" class="columna " id="formFile">
                        </div>
                      </div>                                                   
                      <div class="row fila">
                        <div class="col-4"></div>
                        <div class="col-4">
                          <input type="submit" name="registro" value="Registrar" class="columna btn btn-success" id="boton">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!--fin columna -->
                </div>
                
              </div>
                 

                  
               

                <div class="row">
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
