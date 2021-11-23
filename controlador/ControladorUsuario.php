<?php 
 
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasUsuario.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/Usuario.php");
 

$sen= new SentenciasUsuario();
$usuario= new Usuario();
class ControladorUsuario{

	function mostrar(){
		global $sen;
		$ver=$sen->ver();
		return $ver;
	}

	function encontrarPorId($id){
			global $usuario;
			global $sen;
			$lista=$sen->verPorId($id);
			$perm=mysqli_fetch_array($lista);
			$usuario->id=$perm['id'];
			$usuario->nombre=$perm['nombre'];
			$usuario->edad=$perm['edad'];
			$usuario->gmail=$perm['gmail'];
			$usuario->clave=$perm['clave'];
			$usuario->telefono=$perm['telefono'];
			$usuario->rol=$perm['rol_id'];
			 
			  return $usuario;	
	}

	function sesionEmpleado(){
		try{
			$user=$this->encontrarPorId($_SESSION["idUsuario"]);
			if ($user->rol!=2) {
				echo "pruebaaaa";
				echo ("<script>
					window.location='../../index.php'
				 </script> ");	 
			}
			else{
				echo $user->nombre;
			}
		}
		catch(Exception $e){
			echo ("<script>
					window.location='../../index.php'
				 </script> ");
		}
	}


	function sesionAdmin(){
 		try{
			$user=$this->encontrarPorId($_SESSION["idUsuario"]);
			if ($user->rol!=1) {
				echo "pruebaaaa";
				echo ("<script>
					window.location='../../index.php'
				 </script> ");	 
			}
			else{
				echo $user->nombre;
			}
		}
		catch(Exception $e){
			echo ("<script>
					window.location='../../index.php'
				 </script> ");
		 
		}
	}
}


function registrar(){
	if (isset($_POST['reg'])) {
		global $usuario;
		$usuario->nombre= $_POST['nombre'];
		$usuario->edad= $_POST['edad'];
		$usuario->gmail= $_POST['email'];
		$usuario->clave= $_POST['contrasena'];
		$usuario->telefono= $_POST['telefono'];
		if ($usuario->clave==$_POST['contrasena2']) {
			global $sen;
			$sen->insertar($usuario);
			header("location:../vistas/login.php");
		}
		else{
			echo "las contraseñas deben ser iguales ";
		}
	}
	else{		 
		}
	}

function login(){
	if (isset($_POST['ini'])) {
		session_start();			 
		global $usuario;
		$usuario->gmail=$_POST['email'];
		$usuario->clave=$_POST['clave'];
		global $sen;
		$verificar=$sen->verificar($usuario);
		$perm=mysqli_fetch_array($verificar);
			 	
		if ($perm=="") {
			header("location:../vistas/login.php?mensaje=error");
		}
		else{
			if ($perm['rol_id']==1) {
			 	$_SESSION["idUsuario"]=$perm['id'];
				header("location:../vistas/admin/parqueadero.php");		 
			} 
			else{
				$_SESSION["idUsuario"]=$perm['id'];
					header("location:../vistas/empleado/parqueadero.php");			 
			}
		}	 
	}
}

function borrar(){
	if (isset($_GET['eliminar'])) {
		echo "hola";
		global $sen;
		$sen->eliminar($_GET['eliminar']);
		header("location:../vistas/admin/verEmpleado.php");
			
	}
}

function cerrarSesion(){
	if (isset($_POST['cerrarSesion'])) {
		session_start();
		session_destroy();
		header("location:../");
	}
}
	 
	 
registrar();
login();
borrar();
cerrarSesion();
 ?>
