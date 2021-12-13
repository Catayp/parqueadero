<?php 
include_once("Conexion.php");
$c= new Conexion();
$conexion= $c->conectar();
class SentenciasFactura{
	
	function mostrar(){
		global $conexion;
		$vista=mysqli_query($conexion,"SELECT * FROM factura");
		return $vista;
	}

	function registrarFacturas($factura){
		global $conexion;
		$regP=mysqli_query($conexion,"INSERT INTO factura(tiempo_total, precio_total,vehiculo_id) values($factura->tiempoTotal,$factura->precioTotal,$factura->idVehiculo)");
		return $regP;
	}

	function eliminar($id){
		global $conexion;
		$eliminar= mysqli_query($conexion,"DELETE FROM factura WHERE id=$id");

	}
	function detalleFactura($id){
		global $conexion;
		$mostrar=mysqli_query($conexion,"SELECT * FROM factura WHERE id_factura=$id");
		return $mostrar;
	}

	function traerPrecio($idV){
		global $conexion;
		$precio=mysqli_query($conexion,"SELECT * FROM vehiculo INNER JOIN parqueaderos on id=parqueadero_id where id_vehiculo=$idV");
		return $precio;
	}
}

 ?>