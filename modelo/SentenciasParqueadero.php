<?php 
include_once("Conexion.php");
$c= new Conexion();
$conexion= $c->conectar();
class SentenciasParqueadero{
	
	function mostrar(){
		global $conexion;
		$vista=mysqli_query($conexion,"SELECT * FROM parqueaderos");
		return $vista;
	}

	function registrarParqueaderos($par){
		global $conexion;
	 $cuposForanea=$par->cupos->id;
		$regP=mysqli_query($conexion,"INSERT INTO parqueaderos(nombre,lugar,fecha,precio,cupos) values('$par->nombre','$par->lugar','$par->fecha',$par->precio,'$cuposForanea')");
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
		$editar= mysqli_query($conexion,"UPDATE parqueaderos SET nombre='$par->nombre', lugar='$par->lugar',fecha='$par->fecha',precio=$par->precio, cupos= $cuposF WHERE id=$id");
	}
}

 ?>