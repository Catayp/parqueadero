<?php 
 
require('../../reportes/fpdf.php');
include_once("../../controlador/ControladorVehiculo.php");
 include_once("../../controlador/ControladorParqueadero.php");
include_once("../../controlador/ControladorFactura.php");      
 
$vehiculo= new ControladorVehiculo(); 
    $factura= new ControladorFactura(); 
    $parqueadero= new ControladorParqueadero();
    //objetos de factura
     $detalleFactura=$factura->detalleFactura();
    $campoF=mysqli_fetch_array($detalleFactura);
    $idVehiculo=$campoF['vehiculo_id'];
    $detalleVehiculo=$vehiculo->vistaDetalleFactura($idVehiculo);
    $campoV=mysqli_fetch_array($detalleVehiculo);
    $idParqueadero=$campoV['parqueadero_id'];
    $detalleParqueadero=$parqueadero->vistaDetalleFactura($idParqueadero);
    $campoP=mysqli_fetch_array($detalleParqueadero);
class PDF extends FPDF
{
    function Header()
{
    // Logo
   
$this->Ln(30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Cell(60,10,'Factura Parqueadero',1,0,'C');
    // Salto de línea
    $this->Ln(25);
     
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
// Cargar los datos
function LoadData($file)
{
    // Leer las líneas del fichero
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Tabla simple
function BasicTable($header, $data)
{
    global $campoF,$campoV,$campoP,$factura;   
    // Cabecera
      $this->Image("imagenes/".$campoV['imagen'],10,64,80);
       $this->SetX(95);
       $this->SetFont('Arial','B',14);
       $this->Cell(60,11,'Descripcion:',0,0);
       $this->Cell(20,11,'Marca:',0,0);
       $this->SetFont('Arial','',14);
       $this->Cell(40,11,$campoV['marcas'],0,1);
       $this->SetX(95);
       $this->SetFont('Arial','',12);
       $this->Cell(60,16,$campoV['detalle'],0,0,'L');
       $this->SetFont('Arial','B',14);
        $this->Cell(25,11,'Numero f:',0,0);
        $this->SetFont('Arial','',14);
       $this->Cell(40,11,$campoF['id_factura'],0,1);
       $this->SetX(95);
       $this->SetFont('Arial','',12);
       $this->Cell(60,16,'',0,0,'L');
       $this->SetFont('Arial','B',14);
       $this->Cell(20,11,'Placas:',0,0);
       $this->SetFont('Arial','',14);

       $this->Cell(40,11,$campoV['placas'],0,1);
       $this->SetX(155);
       $this->SetFont('Arial','B',14);
       $this->Cell(33,11,'Valor Minuto:',0,0);
       $this->SetFont('Arial','',14);
       $this->Cell(40,11,$campoP['precio'],0,1);
       $this->Ln(30);
       $this->SetFont('Arial','B',14);

    foreach($header as $col)

        $this->Cell(48,7,$col,1);
    $this->Ln();
    // Datos
    $this->SetFont('Arial','',13);
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(48,6,$col,1);
        $this->Ln();
    }
    $min=$factura->dias_pasados($campoV['fecha_entrada'],date("Y/m/d H:i:s"));
    $tot= $factura->calcularPrecio($min,$campoV['id_vehiculo']);
    $this->SetFont('Arial','B',19);
    $this->Cell(70);
     $this->Cell(32,20,'TOTAL:',0,0);
     $this->SetFont('Arial','',19);
     $this->Cell(32,20,$tot,0,0);
}

// Una tabla más completa
 

// Tabla coloreada
 }

$pdf = new PDF();
// Títulos de las columnas
$header = array('Fecha de Entrada', 'Tiempo de vehiculo', 'Fecha y hora actual', 'Color');
$data1=[$campoV['fecha_entrada'],$campoF['tiempo_total']."  minutos",date("Y/m/d H:i:s"),3];
$data=[$data1];


$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
 
$pdf->Output();

 
 ?>
 
  
