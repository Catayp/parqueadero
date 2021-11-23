<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasParqueadero.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasCupos.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/parqueadero.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/cupos.php");

$senP= new SentenciasParqueadero();
 

class ControladorParqueadero
{
	
	function darFormatoFecha($fechaMuestra){

	 	$fech  =  $fechaMuestra;
		$fechas = explode("-", $fech);
		$diaF  =$fechas[2]; 
		$mesF = $fechas[1]; 
		$anoF = $fechas[0]; 
	 	return  $anoF."-".$mesF."-".$diaF ;
	}

	function mostrar(){

		global $senP;
		$ver=$senP->mostrar();
		return $ver;
	}

	function vistaDetalleFactura($id){
		global $senP;
		$vista=$senP->vistaEdicion($id);
		return $vista;

	}

	
}
	 		if (isset($_POST['registrar'])) {
		 
			$cupos = new Cupos();
			$cupos->cantidadTotal=$_POST['cupos'];
			$cupos->llenos=0;
			$cupos->vacios=$cupos->cantidadTotal;
			$senCupos= new SentenciasCupo();
			$senCupos->registrarCupo($cupos);
			$ultimoCupo=$senCupos->traerUltimo();
			 
			$p= new Parqueadero();
			$Cp= new ControladorParqueadero();
			$p->nombre= $_POST['nombre'];
			$p->lugar= $_POST['lugar'];
			$p->fecha=$Cp->darFormatoFecha($_POST['fecha'])  ;
			$p->precio= $_POST['precio'];
			$p->cupos=$ultimoCupo; 
			$regP= $senP->registrarParqueaderos($p); 
			header("location:../vistas/admin/parqueadero.php");

		
	}
	if (isset($_GET['eliminar'])) {
		$senP->eliminar($_GET['eliminar']);
		header("location:../vistas/admin/parqueadero.php");
		
	}
		
	if (isset($_GET['editar'])) {
		$id= $_GET['editar'];
		$mostrar=$senP->vistaEdicion($id);
		$campos= mysqli_fetch_array($mostrar);
		$nombre=$campos['nombre'];
		$lugar=$campos['lugar'];
		$fecha=$campos['fecha'];
		$precio=$campos['precio'];
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
		$p->precio= $_POST['precio'];
		$p->cupos=$cupos; 
		$senP->editar($_POST['idvergas'],$p);  

	header("location:../vistas/admin/parqueadero.php");
	}

 
 ?>
