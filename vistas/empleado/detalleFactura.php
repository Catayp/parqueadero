<!DOCTYPE html>
<html lang="en">
 
<?php include_once("../../controlador/ControladorVehiculo.php");
 include_once("../../controlador/ControladorParqueadero.php");
include_once("../../controlador/ControladorFactura.php");      
include_once("plantillas/header.php");
$vehiculo= new ControladorVehiculo(); 
$factura= new ControladorFactura(); 
$parqueadero= new ControladorParqueadero();
?>
<link rel="stylesheet" type="text/css" href="../css/factura.css">
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
            <h1 class="m-0" style="color: black">Vehiculos</h1>
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
                <h5 class="card-title">Detalle</h5>

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
              <?php 
              $detalleFactura=$factura->detalleFactura();
              $campoF=mysqli_fetch_array($detalleFactura);
              $idVehiculo=$campoF['vehiculo_id'];
              $detalleVehiculo=$vehiculo->vistaDetalleFactura($idVehiculo);
              $campoV=mysqli_fetch_array($detalleVehiculo);
              $idParqueadero=$campoV['parqueadero_id'];
              $detalleParqueadero=$parqueadero->vistaDetalleFactura($idParqueadero);
              $campoP=mysqli_fetch_array($detalleParqueadero);
              ?>
              <div class="card-body">
                <div class="row">
                  <section class="content content_content" style="width: 70%; margin: auto;">
                    <section class="invoice" style="background-color: #242628;color: white">
                        <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12">
                          <h2 class="page-header">
                            <i class="fa fa-globe"></i> Vehiculo factura.
                            <small class="pull-right">Fecha de entrada: <?php echo $campoV['fecha_entrada']; ?></small>
                          </h2>
                        </div><!-- /.col -->
                      </div>
                        <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <img src="imagenes/<?php echo $campoV['imagen']; ?>" id="imag">
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <address>
                            <b>descripcion:</b><br><br><?php echo $campoV['detalle']; ?> 
                          </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Marca
                          <strong>
                            <?php echo $campoV['marcas']; ?>
                          </strong>
                          <br><br>
                          <b>Placas: <?php echo $campoV['placas']; ?></b><br>
                          <br>
                          <b>Precio por minuto:</b><?php echo "     ". $campoP['precio']; ?><br><br>        
                          <b>numero de factura:</b> <?php echo $campoF['id_factura']; ?>
                        </div><!-- /.col -->
                      </div><!-- /.row -->

                        <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Hora de entrada</th>
                                <th>tiempo del vehiculo</th>
                                <th>Fecha y hora actual</th>
                                <th>color</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo $campoV['fecha_entrada']; ?> </td>
                                <td><?php echo ($campoF['tiempo_total']."  minutos"); ?> </td>
                                <td><?php echo date("Y/m/d H:i:s") ; ?></td>
                                <td> <button style="width: 20%; height: 15px; background-color: <?php echo $campoV['color']; ?>"></button> </td>
                              </tr>
                            </tbody>
                          </table>
                        </div><!-- /.col -->
                      </div><!-- /.row -->

                      <div class="row">
                            <!-- accepted payments column -->
                        <div class="col-md-12">
                          <p class="lead">fecha: <?php echo date("Y/m/d H:i:s") ; ?></p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>          
                                <tr>
                                  <th>Total:</th>
                                  <td> <?php $min=$factura->dias_pasados($campoV['fecha_entrada'],date("Y/m/d H:i:s"));
                                  $tot= $factura->calcularPrecio($min,$campoV['id_vehiculo']);
                                  echo ($tot);?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div><!-- /.col -->
                      </div><!-- /.row -->

                        <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <a  href="reporte.php?f=<?php echo $campoF['id_factura']; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir Factura</a>
                          <a href="reporte.php?f=<?php echo $campoF['id_factura']; ?>" class="btn btn-success pull-right"><i class="fa fa-download"></i>  Generar PDF  </a>                                
                        </div>
                      </div>
                    </section>
                  </section>    
                </div>
                <a href="listaFactura.php" class="btn btn-warning">volver</a>   
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

   

  <!-- Main Footer -->
   <?php include_once("plantillas/footer.php"); ?>
 
 
</body>
</html>
