<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

define('FPDF_FONTPATH', '../ypathcss/bantuan/fpdf/font/');
require('../ypathcss/bantuan/fpdf/fpdf.php');

class PDF extends FPDF{
  function Header(){
    $this->SetTextColor(128,0,0);
    $this->SetFont('Arial','B','12');//	$this->SetFont('Times','',12);
    $this->Cell(20,0,'Data suratmasuk',0,0,'L');
    $this->Ln();
    $this->Cell(5,1,'Laporan data suratmasuk',0,0,'L');
    $this->Ln();
	

	
  }
  
  function Footer(){
	$this->SetY(-4,5);
	$this->Image("../ypathfile/avatar.jpg", (8.5/2)-1.5, 9.8, 3, 1, "JPG", "Sistem Informasi Pengarsipan");
    $this->SetY(-2,5);
    $this->Cell(0,1,$this->PageNo(),0,0,'C');
	
  }
} 

$sql = "select * from `$tbsuratmasuk`";
$jml =  getJum($conn,$sql);

$i=0;
$arr=getData($conn,$sql);
		foreach($arr as $d) {	
  $cell[$i][0]=$d["id_sm"];
  $cell[$i][1]=$d["id_pegawai"];
  $cell[$i][2]=$d["tanggalterima_sm"];
  $cell[$i][3]=$d["sifat_sm"];
  $cell[$i][4]=$d["tanggalsurat_sm"];
  $cell[$i][5]=$d["asal_sm"];
  $cell[$i][6]=$d["perihal_sm"];
  $cell[$i][7]=$d["lampiran_sm"];
  $cell[$i][8]=$d["gambar_sm"];
  $cell[$i][9]=$d["catatan_sm"];
  $cell[$i][10]=$d["bagian_sm"];
  $cell[$i][11]=$d["status_sm"];
  $cell[$i][12]=$d["status_bagian"];
  $cell[$i][13]=$d["lokasi_sm"];
  
  $i++;
}
				
				
$pdf=new PDF('L','cm','A4');
//$pdf=new PDF("P","in","Letter");
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B','9');
$pdf->SetFillColor(192,192,192);
$pdf->Cell(1,1,'no','LR',0,'L',1);
//$pdf->MultiCell(0, 0.5, $lipsum1, 'LR', "L");
$pdf->Cell(2,1,'id_sm','LR',0,'C',1);
$pdf->Cell(7,1,'id_pegawai','LR',0,'C',1);
$pdf->Cell(7,1,'tanggalterima_sm','LR',0,'C',1);
$pdf->Cell(5,1,'sifat_sm','LR',0,'C',1);
$pdf->Cell(5,1,'no_sm','LR',0,'C',1);
$pdf->Cell(5,1,'tanggalsurat_sm','LR',0,'C',1);
$pdf->Cell(5,1,'asal_sm','LR',0,'C',1);
$pdf->Cell(5,1,'perihal_sm','LR',0,'C',1);
$pdf->Cell(3,1,'lampiran_sm','LR',0,'C',1);
$pdf->Cell(5,1,'catatan_sm','LR',0,'C',1);
$pdf->Cell(5,1,'bagian_sm','LR',0,'C',1);
$pdf->Cell(5,1,'status_sm','LR',0,'C',1);
$pdf->Cell(5,1,'status_bagian','LR',0,'C',1);
$pdf->Cell(9,1,'lokasi_sm','LR',0,'C',1);

$pdf->Ln();
$pdf->SetFont('Arial','','8');

for ($j=0;$j<$i;$j++){
  $pdf->Cell(1,1,$j+1,'B',0,'L');         // no
  $pdf->Cell(2,1,$cell[$j][0],'B',0,'L'); // id_sm
  $pdf->Cell(7,1,$cell[$j][1],'B',0,'L'); // id_pegawai
  $pdf->Cell(7,1,$cell[$j][2],'B',0,'L'); // tanggalterima_sm
  $pdf->Cell(5,1,$cell[$j][3],'B',0,'L'); // sifat_sm
  $pdf->Cell(5,1,$cell[$j][4],'B',0,'L'); // tanggalsurat_sm
  $pdf->Cell(5,1,$cell[$j][5],'B',0,'L'); // tanggalsurat_sm
  $pdf->Cell(5,1,$cell[$j][6],'B',0,'L'); // tanggalsurat_sm
  $pdf->Cell(5,1,$cell[$j][7],'B',0,'L'); // tanggalsurat_sm
  $pdf->Cell(5,1,$cell[$j][8],'B',0,'L'); // tanggalsurat_sm
  $pdf->Cell(5,1,$cell[$j][9],'B',0,'L'); // perihal_sm
  $pdf->Cell(3,1,$cell[$j][10],'B',0,'L'); // lampiran_sm
  $pdf->Cell(9,1,$cell[$j][11],'B',0,'L'); // lokasi_sm
  $pdf->Cell(9,1,$cell[$j][12],'B',0,'L'); // lokasi_sm
  $pdf->Cell(9,1,$cell[$j][13],'B',0,'L'); // lokasi_sm
  
  
  $pdf->Ln();
}
$date= date('jnYHi');
$pdf->Output('suratmasuk_export_'.$date.'.pdf', 'D');
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
?>

