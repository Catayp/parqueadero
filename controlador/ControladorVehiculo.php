<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasVehiculo.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/Vehiculo.php");
$sen= new Sentencias();
 
$vehiculo= new Vehiculo();
class ControladorVehiculo{
	function mostrar(){
		if (isset($_GET['ingresar'])) {
			global $sen;
			$ver=$sen->mostrar($_GET['ingresar']);
			return $ver;
		}
		
	}
}
$control= new ControladorVehiculo();
$control->mostrar();


 ?>
