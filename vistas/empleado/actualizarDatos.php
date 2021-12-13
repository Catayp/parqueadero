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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar</h1>
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
                <h5 class="card-title">Editar Datos Personales</h5>

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
                    <h1>Actualizacion de mis datos</h1>
                    <!--inicio de columnas -->
                    <?php 
                    $controlUsu= new  ControladorUsuario();
                    $usEdicion= $controlUsu->vistaEdicion();
                    ?>
                    <form action="../../controlador/ControladorUsuario.php" method="POST">
                      <div class="row fila">   
                       <input type="text" name="idUs" hidden="true" placeholder="id" value="<?php echo $usEdicion->id; ?>" class="columna">     
                                 
                        <div class="col-6">
                          <input type="text" required="true" name="nombre" placeholder="nombre" value="<?php echo $usEdicion->nombre; ?>" class="columna">
                        </div>
                        <div class="col-6" >
                          <input type="number" required="true"  name="edad" placeholder="edad" value="<?php echo $usEdicion->edad; ?>"class="columna">
                        </div>
                      </div>

                      <div class="row fila">                  
                        <div class="col-12">
                          <input type="text" required="true" name="email" placeholder="Email" value="<?php echo $usEdicion->gmail; ?>" class="columna">
                        </div>
                      </div>

                      <div class="row fila"> 
                        <div class="col-12">
                          <input type="password" required="true" name="clave" placeholder="clave" value="<?php echo $usEdicion->clave; ?>" class="columna">
                        </div>
                        
                      </div>

                      <div class="row fila">                  
                        <div class="col-12 columna">
                          <input type="number" required="true" name="telefono" placeholder="telefono"  value="<?php echo $usEdicion->telefono; ?>" class="columna">
                        </div>
                      </div>
              
                      <div class="row fila">
                        <div class="col-4"></div>
                        <div class="col-4">
                          <input type="submit" name="actualizar" value="Editar" class="columna btn btn-success" id="boton">
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
