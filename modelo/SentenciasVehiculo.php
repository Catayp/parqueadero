<?php 
include_once("Conexion.php");
$c= new Conexion();
$conexion= $c->conectar();
class SentenciasV{
	
	function mostrar($id){
		global $conexion;
		$vista=mysqli_query($conexion,"SELECT * FROM vehiculo WHERE parqueadero_id= $id && estado=1");
		return $vista;
	}

	function registrar($vehiculo){
		global $conexion;
		mysqli_query($conexion, "INSERT INTO vehiculo(placas,marcas,color,detalle,fecha_entrada,parqueadero_id,imagen,estado) VALUES('$vehiculo->placas','$vehiculo->marca','$vehiculo->color','$vehiculo->descripcion','$vehiculo->fechaActual',$vehiculo->parqueaderoId,'$vehiculo->imagen',1)");
	}

	function verDetalle($id){
		global $conexion;
		$verD=mysqli_query($conexion,"SELECT * FROM  vehiculo WHERE id_vehiculo=$id");
		return $verD;

	}
	function cambiarEstado($idVehiculo){
		global $conexion;
		$verD=mysqli_query($conexion,"UPDATE vehiculo SET estado=0 where id_vehiculo=$idVehiculo");
	}
}

 ?>