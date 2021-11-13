<?php 
include_once("Conexion.php");
$c= new Conexion();
$conexion= $c->conectar();
class Sentencias{
	
	function mostrar(){
		global $conexion;
		$vista=mysqli_query($conexion,"SELECT * FROM parqueaderos");
		return $vista;
	}

	function registrarParqueaderos($par){
		global $conexion;
	 $cuposForanea=$par->cupos->id;
		$regP=mysqli_query($conexion,"INSERT INTO parqueaderos(nombre,lugar,precio_diurno,precio_nocturno,cupos) values('$par->nombre','$par->lugar',$par->precio_diurno,$par->precio_nocturno,'$cuposForanea')");
		return $regP;
	}

	function eliminar($id){
		global $conexion;
		$eliminar= mysqli_query($conexion,"DELETE FROM parqueaderos WHERE id=$id");

	}
}

 ?>