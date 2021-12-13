<?php 
include_once("Conexion.php");
include_once("entidades/Cupos.php");
$c= new Conexion();
$conexion= $c->conectar();
class SentenciasCupo{

	function registrarCupo($cupos){
		global $conexion;
		$regC=mysqli_query($conexion,"INSERT INTO cupos(cantidad_total,llenos,vacios) values($cupos->cantidadTotal,$cupos->llenos,$cupos->vacios)");
	}

	function traerUltimo(){
		global $conexion;
		$traer=mysqli_query($conexion,"SELECT * FROM cupos ORDER BY id_cupos DESC limit 1");
		$cuposObj = new Cupos();
		while ($cupos= mysqli_fetch_array($traer)) {
			$cuposObj->id=$cupos['id_cupos']; 
			$cuposObj->cantidadTotal=$cupos['cantidad_total'];
			$cuposObj->llenos=$cupos['llenos'];
			$cuposObj->vacios=$cupos['vacios'];  
		}
		return $cuposObj;
	}
	function actualizarCupo($cupos){
		global $conexion;
		$editC=mysqli_query($conexion,"UPDATE cupos SET cantidad_total=$cupos->cantidadTotal,vacios=($cupos->cantidadTotal-$cupos->llenos),llenos=$cupos->llenos WHERE id_cupos=$cupos->id");
	}
	function traerCupo($id){
		global $conexion;
		$traer=mysqli_query($conexion,"SELECT * FROM cupos WHERE id_cupos=$id");
		$cupos = new Cupos();
		while ($c= mysqli_fetch_array($traer)) {
			$cupos->id=$c['id_cupos']; 
			$cupos->cantidadTotal=$c['cantidad_total'];
			$cupos->vacios=$c['vacios'];
			$cupos->llenos=$c['llenos'];
		
		}
		return $cupos;
	}

	function restarLlenos($cupos){
		global $conexion;
		$editC=mysqli_query($conexion,"UPDATE cupos SET cantidad_total=$cupos->cantidadTotal,vacios=($cupos->vacios),llenos=$cupos->llenos WHERE id_cupos=$cupos->id");
	}
}

 ?>