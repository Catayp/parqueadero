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
}

 ?>