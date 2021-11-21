<?php 
include_once("Conexion.php");
$c= new Conexion();
$conexion= $c->conectar();
class Sentencias{
	
	function mostrar($id){
		global $conexion;
		$vista=mysqli_query($conexion,"SELECT * FROM vehiculo WHERE parqueadero_id= $id");
		return $vista;
	}

	function registrar($vehiculo){
		global $conexion;
		mysqli_query($conexion, "INSERT INTO vehiculo(placas,marcas,color,detalle,fecha_entrada,parqueadero_id,imagen) VALUES('$vehiculo->placas','$vehiculo->marca','$vehiculo->color','$vehiculo->descripcion','$vehiculo->fechaActual',$vehiculo->parqueaderoId,'$vehiculo->imagen')");
	}

	function verDetalle($id){
		global $conexion;
		$verD=mysqli_query($conexion,"SELECT * FROM  vehiculo WHERE id_vehiculo=$id");
		return $verD;

	}
}

 ?>