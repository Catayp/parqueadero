<?php 
include_once("Conexion.php");
$c= new Conexion();
$conexion= $c->conectar();
class SentenciasUsuario{

	function insertar($usuario){
		global $conexion;
		mysqli_query($conexion,"insert into usuario(nombre,edad,gmail,clave,telefono,rol_id) values('$usuario->nombre','$usuario->edad','$usuario->gmail','$usuario->clave','$usuario->telefono',2)") or die("error en sentancia");

	}

	function verificar($usuario){
		global $conexion;
		$seleccion=mysqli_query($conexion,"SELECT * FROM usuario WHERE gmail= '$usuario->gmail' &&  clave='$usuario->clave' ");
		return $seleccion;
	}

	function ver(){
		global $conexion;
		$ver= mysqli_query($conexion,"SELECT * FROM usuario");
		return $ver;
	}
	function verPorId($id){
		global $conexion;
		$ver= mysqli_query($conexion,"SELECT * FROM usuario where id=$id");
		return $ver;
	}

	function eliminar($id){
		global $conexion;
		$borrar= mysqli_query($conexion,"DELETE FROM usuario WHERE id=$id");
	}

	function edicion($usuario){
		global $conexion;
		mysqli_query($conexion,"UPDATE usuario SET nombre= '$usuario->nombre',edad=$usuario->edad, gmail='$usuario->gmail', clave='$usuario->clave',telefono= $usuario->telefono WHERE id=$usuario->id");
	}
}

 ?>