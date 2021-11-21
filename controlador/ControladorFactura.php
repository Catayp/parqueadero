<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasFactura.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasVehiculo.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/Factura.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/Vehiculo.php");
$senF= new SentenciasFactura();
 $f= new Factura();

class ControladorFactura
{
	
 
	function mostrarFactura(){
		global $senF;
		$ver=$senF->mostrar();
		return $ver;
	}
	function detalleFactura(){
		if (isset($_GET['f'])){
			global $senF;
			$detalle=$senF->detalleFactura($_GET['f']);
			return $detalle;
		}
	}

	function dias_pasados($fecha_inicial,$fecha_final){
		$minutos = (strtotime($fecha_inicial)-strtotime($fecha_final))/60;
		$minutos = abs($minutos);
		$minutos = floor($minutos);
		return $minutos;
	}

	function calcularPrecio($minutos){
		return 	$minutos*60;

	}
	
}

function registrar(){
	if (isset($_GET['idVehiculo'])) {
		global $f,$senF;
		$f->tiempoTotal=$_GET['tiempo'];
		echo $_GET['tiempo'];
		$f->precioTotal=$_GET['total'];
		$f->idVehiculo=$_GET['idVehiculo'];
		$senF->registrarFacturas($f);
		header("location:../vistas/empleado/listaFactura.php");

	}
	
}
	
registrar();	


 
 ?>
