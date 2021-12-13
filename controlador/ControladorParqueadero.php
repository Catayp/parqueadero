<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasParqueadero.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/SentenciasCupos.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/parqueadero.php");
include_once($_SERVER['DOCUMENT_ROOT']."/parqueadero/modelo/entidades/cupos.php");

$senP= new SentenciasParqueadero();
$cupos = new Cupos();
$senCupos= new SentenciasCupo();
class ControladorParqueadero {
	
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

	function sumarCupos($id){
		global $senP,$cupos,$senCupos;
		$traerP= $senP->vistaEdicion($id);
		$espacio=mysqli_fetch_array($traerP);
		$cupos->id=$espacio['cupos'];
		$datosC=$senCupos->traerCupo($cupos->id);
		$cupos->llenos=$datosC->llenos+1;
		$cupos->cantidadTotal=$datosC->cantidadTotal;
		$cupos->vacios=$datosC->vacios;
		$senCupos->actualizarCupo($cupos);
	}

	function restarCuposLlenos($id){
		global $senP,$cupos,$senCupos;
		$traerP= $senP->vistaEdicion($id);
		$espacio=mysqli_fetch_array($traerP);
		$cupos->id=$espacio['cupos'];
		$datosC=$senCupos->traerCupo($cupos->id);
		$cupos->llenos=$datosC->llenos-1;
		$cupos->cantidadTotal=$datosC->cantidadTotal;
		$cupos->vacios=$datosC->vacios+1;
		$senCupos->restarLlenos($cupos);
	}

	function mostrarCupo($cupoForanea){
		global $senCupos;
		$cup=$senCupos->traerCupo($cupoForanea);
		return $cup;
		
	}
}
	

	 if (isset($_POST['registrar'])) {
		$cupos->cantidadTotal=$_POST['cupos'];
		$cupos->llenos=0;
		$cupos->vacios=$cupos->cantidadTotal;		
		$senCupos->registrarCupo($cupos);
		$ultimoCupo=$senCupos->traerUltimo();			 
		$p= new Parqueadero();
		$Cp= new ControladorParqueadero();
		$p->nombre= $_POST['nombre'];
		$p->lugar= $_POST['lugar'];
		$p->fecha=$Cp->darFormatoFecha($_POST['fecha'])  ;
		$p->precio= $_POST['precio'];
		$p->cupos=$ultimoCupo;
		$p->imagen=basename($_FILES['imagen']['name']);
		echo $p->imagen;
		$ruta="../vistas/admin/imagenesParq/".basename($_FILES['imagen']['name']);
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
			echo "El archivo ".basename( $_FILES['imagen']['name'])." ha sido subido satisfactoriamente</b></font></div>";
			}
		else
			{
				$p->imagen="defecto.jpg";
			} 
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
    	$cupos=$senCupos->traerCupo($campos['cupos']);
	}


	if (isset($_POST['actualizar'])) {
		
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

function enviarCorreo(){
	if (isset($_POST['enviarMensaje'])) {
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
		$email=$_POST['email'];
		$mensaje=$_POST['mensaje'];
		$parqueaderoN=$_POST['parqueadero'];
		$lugar=$_POST['lugar'];
		$fecha=$_POST['fecha'];
		mail("l.c.yepes802jm@gmail.com", "aparta cupo", "el mensaje es ".$mensaje .", el parqueadero es ".$parqueaderoN.", el lugar es ".$lugar." Sus datos son: nombre:".$nombre.", telefono:". $telefono."y email: ".$email. " y la fecha y hora de el cupo es ".$fecha);
	}
	
}

enviarCorreo();

 
 ?>
