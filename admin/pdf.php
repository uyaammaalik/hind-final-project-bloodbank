<?php

require('../fpdf/fpdf.php');



$db = new PDO('mysql:host=localhost;dbname=blood_bank','root','');

class mypdf extends FPDF{
	function header(){
		$this->SetFont('Arial','B',14);
		$this->Cell(195,5,'Blood Bank',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(195,10,'Details about your request',0,0,'C');
		$this->Ln(20 );
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page'.$this->PageNo(). '/{nb}',0,0,'C');
	}
	function headerTable(){
		$this->SetFont('Times','B',12);
		$this->Cell(50,10,'Name',1,0,'C');
		$this->Cell(40,10,'Age',1,0,'C');
		$this->Cell(60,10,'Blood Group',1,0,'C');
		$this->Cell(30,10,'Date',1,0,'C');
		$this->Ln();
		
	}
	function viewTable($db){
		$this->SetFont('Times','',12);
		$stmt = $db->query('select * from docrequest');
		while($data = $stmt->fetch(PDO::FETCH_OBJ)){
			$this->Cell(50,10,$data->name,1,0,'C');
			$this->Cell(40,10,$data->age,1,0,'L');
			$this->Cell(60,10,$data->bloodgroup,1,0,'L');
			$this->Cell(30,10,$data->date,1,0,'L');
			$this->Ln();
		}
	}
}

$pdf = new mypdf();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->HeaderTable();
$pdf->viewTable($db);
$pdf->Output();

?>