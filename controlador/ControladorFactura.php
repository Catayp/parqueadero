<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasParqueadero.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasCupos.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/parqueadero.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/cupos.php");
$sen= new Sentencias();
 

class ControladorVehiculo
{
	
 
	function mostrar(){
		global $sen;
		$ver=$sen->mostrar();
		return $ver;
	}

	
	 	}
	 		if (isset($_POST['registrar'])) {
			echo "entro";
			$cupos = new Cupos();
			$cupos->cantidadTotal=$_POST['cupos'];
			$cupos->llenos=0;
			$cupos->vacios=$cupos->cantidadTotal;
			$senCupos= new SentenciasCupo();
			$senCupos->registrarCupo($cupos);
			$ultimoCupo=$senCupos->traerUltimo();
			echo $_POST['cupos'];
			$p= new Parqueadero();
			$p->nombre= $_POST['nombre'];
			$p->lugar= $_POST['lugar'];
			$p->fecha= $_POST['fecha'];
			$p->precio_diurno= $_POST['precioD'];
			$p->precio_nocturno= $_POST['precioN'];
			$p->cupos=$ultimoCupo; 

			global $sen;
			$regP= $sen->registrarParqueaderos($p); 
			header("location:../vistas/admin/parqueadero.php");

			


		
	}
	if (isset($_GET['eliminar'])) {
		$sen->eliminar($_GET['eliminar']);
		header("location:../vistas/admin/parqueadero.php");

			 


			


		
	}
		


 
 ?>
