<!DOCTYPE html>
<html lang="en">
 
<?php include_once("../../controlador/ControladorVehiculo.php");
$vehiculo= new ControladorVehiculo();       
include_once("plantillas/header.php");
?>
<link rel="stylesheet" type="text/css" href="../css/detalle.css">
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
              include_once("../../controlador/ControladorFactura.php");
              $factura= new ControladorFactura(); 

              $detalle=$vehiculo->mostrarDetalle();
              $campo=mysqli_fetch_array($detalle);
                ?>
              <div class="card-body">
                <div class="row">
                  <div class="col-2 ">
                  </div>
                  <div class="col-4 item-photo">
                    <img style="width:100%; height: 100%" src="imagenes/<?php echo($campo['imagen']); ?> " />
                  </div>
                  <div class="col-5" style="border:0px solid gray; background-color:white;">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?php echo($campo['marcas']); ?></h3>    
                    <h5 style="color:#337ab7">En el parqueadero xxx</h5>
        
                    <!-- Precios -->
                    <h6 class="title-price"><small>PLACAS</small></h6>
                    <h3 style="margin-top:0px;"><?php echo($campo['placas']); ?></h3>
        
                    <!-- Detalles especificos del producto -->
                    <div class="section">
                      <h6 class="title-attr" style="margin-top:15px;" ><small>COLOR</small></h6>                    
                      <div>
                        <div class="attr" style="width:25px;background:<?php echo($campo['color']); ?>;"></div>                            
                      </div>
                    </div>
                    <div class="section" style="padding-bottom:5px;">
                      <h6 class="title-attr"><small>Minutos</small></h6>                    
                      <div>                           
                        <div style="color: black; font-size: 21px"><strong><?php $min= ($factura->dias_pasados($campo['fecha_entrada'],date("Y/m/d H:i:s")));
                          echo $min;?></strong>
                        </div>
                            
                        </div>
                    </div>   
                    <div class="section" style="padding-bottom:20px;">
                      <h6 class="title-attr"><small>Total</small></h6>                    
                      <div style="color: black; font-size: 21px">
                        <strong> 
                          <?php $tot= $factura->calcularPrecio($min,$campo['id_vehiculo']);
                          echo($tot);

                          ?>
                        </strong>
                      </div>
                    </div>                
        
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                      <a href="../../controlador/ControladorFactura.php?idVehiculo=<?php echo($campo['id_vehiculo']); ?>&tiempo=<?php echo($min) ;?>&total=<?php echo($tot) ; ?>"class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Sacar Vehiculo</a>   
                    </div>                                        
                  </div>      
                  <div class="col-12" style="padding:3% 8% 0% 17%" >
                    <ul class="menu-items">
                        <li class="active" style="font-size: 20px">Descripcion</li>
                        
                    </ul>
                    <div>
                      <div style=" width:100%;border-top:1px solid silver">
                        <p style="padding:15px; font-size: 15px">
                            <?php echo($campo['detalle']); ?>   
                        </p>
                      </div>
                    </div> 
                  </div>    
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
                  <!-- fin formulario -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- Main Footer -->
  <?php include_once("plantillas/footer.php"); ?>
 
 
</body>
</html>
