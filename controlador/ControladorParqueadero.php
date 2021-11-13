<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasParqueadero.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasCupos.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/parqueadero.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/cupos.php");
$sen= new Sentencias();
 

class ControladorParqueadero
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
			$regP= $sen->registrarParqueaderos($p); 
			header("location:../vistas/admin/parqueadero.php");

		
	}
	if (isset($_GET['eliminar'])) {
		$sen->eliminar($_GET['eliminar']);
		header("location:../vistas/admin/parqueadero.php");
		
	}
		
	if (isset($_GET['editar'])) {
		$id= $_GET['editar'];
		$mostrar=$sen->vistaEdicion($id);
		$campos= mysqli_fetch_array($mostrar);
		$nombre=$campos['nombre'];
		$lugar=$campos['lugar'];
		$fecha=$campos['fecha'];
		$precioDiurno=$campos['precio_diurno'];
		$precioNocturno=$campos['precio_nocturno'];
		$cupos = new Cupos();  
		$senCupos= new SentenciasCupo();
    	$cupos=$senCupos->traerCupo($campos['cupos']);


	}


	if (isset($_POST['actualizar'])) {
		$cupos = new Cupos();  
		$senCupos= new SentenciasCupo();
    	$cupos=$senCupos->traerCupo($_POST['idcupos']);
 		$cupos->cantidadTotal= $_POST['cupos'];
		$senCupos->actualizarCupo($cupos);
		$p= new Parqueadero();
		$p->nombre= $_POST['nombre'];
		$p->lugar= $_POST['lugar'];
		$p->fecha= $_POST['fecha'];
		$p->precio_diurno= $_POST['precioD'];
		$p->precio_nocturno= $_POST['precioN'];
		$p->cupos=$cupos; 
		$sen->editar($_POST['idvergas'],$p);  

	//	header("location:../vistas/admin/parqueadero.php");
	}

 
 ?>
