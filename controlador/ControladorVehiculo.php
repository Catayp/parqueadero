<?php 
session_start();
  include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasVehiculo.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/Vehiculo.php");
$sen= new Sentencias();
date_default_timezone_set("America/Bogota");
  
$vehiculo= new Vehiculo();
class ControladorVehiculo{
	function mostrar(){

		if (isset($_GET['ingresar'])) {
			  
			$_SESSION['parqId']=$_GET['ingresar'];

			global $sen;
			$ver=$sen->mostrar($_GET['ingresar']);
			return $ver;
		}	
	}

	function traerIdP(){
		if (isset($_GET['registrar'])) {
			$pId=$_GET['registrar'];
			return $pId;
		}
	}

	function mostrarDetalle(){
		if (isset($_GET['id'])) {
			global $sen;
			$detalle= $sen->verDetalle($_GET['id']);
			return $detalle;
		}
	}
	

	function vistaDetalleFactura($idVehiculo){
		global $sen,$vehiculo;
		$vehiculo->id=$idVehiculo;
		$detalleF=$sen->verDetalle($vehiculo->id);
		return $detalleF;

	}
}
 

//$fecha_dada= "2021/11/17 5:19:16";
 

 
 

function registrarVehiculo(){
	if (isset($_POST['registro'])) {
		global $vehiculo,$sen;
		$vehiculo->placas=$_POST['placas'];
		$vehiculo->marca=$_POST['marca'];
		$vehiculo->color=$_POST['color'];
		$vehiculo->descripcion=$_POST['descripcion'];	
		$vehiculo->parqueaderoId=$_SESSION['parqId'];
	   	$vehiculo->imagen=basename($_FILES['imagen']['name']);
	 	$fecha = date("Y-m-d H-i-s"); 
          echo $fecha;
	   	$vehiculo->fechaActual=$fecha;
	   	$ruta="../vistas/empleado/imagenes/".basename($_FILES['imagen']['name']);
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
			echo "El archivo ".basename( $_FILES['imagen']['name'])." ha sido subido satisfactoriamente</b></font></div>";
			}
		else
			{
				$vehiculo->imagen="defecto.jpg";
			}
			$sen->registrar($vehiculo);
      header("location:../vistas/empleado/listaVehiculo.php?ingresar=$vehiculo->parqueaderoId");
		
	}
}
$control= new ControladorVehiculo();
$control->mostrar();
registrarVehiculo();

 ?>
