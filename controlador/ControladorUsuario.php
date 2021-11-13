<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasUsuario.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/Usuario.php");


$sen= new Sentencias();
$usuario= new Usuario();
class ControladorUsuario{
	
	function mostrar(){
		global $sen;
		$ver=$sen->ver();
		return $ver;
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
			echo "no se realizo la operacion";
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
			while ($perm=mysqli_fetch_array($verificar)) {
				if ($perm['rol_id']==1) {
					header("location:../vistas/admin/parqueadero.php");
				}
				else{
					header("location:../vistas/empleado/parqueadero.php");
				}
			}
		}
		else{
			echo "no se realizo la operacion";
		}
	}

	function borrar(){
		if (isset($_GET['eliminar'])) {
			echo "hola";
			global $sen;
			$sen->eliminar($_GET['eliminar']);
			header("location:../vistas/admin/parqueadero.php");
			
		}
	}
registrar();
login();
borrar();
 ?>
