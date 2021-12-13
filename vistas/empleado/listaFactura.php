<!DOCTYPE html>
<html lang="en">
 
<?php include_once("../../controlador/ControladorFactura.php");
               $fac= new ControladorFactura();       
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
            <h1 class="m-0"style="color: black">Facturas Vehiculos</h1>
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
                <h5 class="card-title">Facturas</h5>

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
                  <table class="table table-dark table-striped" >
                    
                      
                       
                    <thead>
                      <tr>
                        <th scope="col">No Factura</th>
                        <th scope="col">Tiempo total</th>
                        <th scope="col">Precio total</th>
                        <th scope="col">placa vehiculo</th>
                     
                        <th scope="col">DETALLE</th>

                      </tr>
                    </thead>
                    <?php $vista=$fac->mostrarFactura();
                     while ($espacio=mysqli_fetch_array($vista)) {?>
                      <tbody>
                        <tr>
                          <th><?php echo($espacio['id_factura']) ?></td>
                          <td><?php echo($espacio['tiempo_total']) ?></td>
                          <td><?php echo($espacio['precio_total']) ?></td>
                          <td>xxxx</td>
                          <td><a href="detalleFactura.php?f=<?php echo($espacio['id_factura']) ?>" class="btn btn-success">DETALLE</a></td>                          
                        </tr>
                      </tbody>
                     <?php  }?>
                  </table>
                  
                    
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
      </div>
    </section>
  </div>

   <?php include_once("plantillas/footer.php"); ?>
 
 
</body>
</html>
