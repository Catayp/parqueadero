<?php 
class Conexion{
	public $servidor,$usuario,$password,$bd;

	function conectar(){
		$this->servidor="localhost";
		$this->usuario="root";
		$this->password="";
		$this->bd="parqueadero";
		$con= mysqli_connect($this->servidor,$this->usuario,$this->password,$this->bd);
		return $con;

	}
}

 ?>