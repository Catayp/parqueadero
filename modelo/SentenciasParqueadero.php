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

	function vistaEdicion($id){
		global $conexion;
		$mostrar=mysqli_query($conexion,"SELECT * FROM parqueaderos WHERE id=$id");
		return $mostrar;
	}

	function editar($id,$par){
		global $conexion;
		$cuposF=$par->cupos->id;
		$editar= mysqli_query($conexion,"UPDATE parqueaderos SET nombre='$par->nombre', lugar='$par->lugar',fecha='$par->fecha',precio_diurno=$par->precio_diurno,precio_nocturno=$par->precio_nocturno, cupos= $cuposF WHERE id=$id");
	}
}

 ?>