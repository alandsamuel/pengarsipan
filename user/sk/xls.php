<?php
require_once"../koneksivar.php";
$bag = $_SESSION['bagian'];
$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id_sk".$separator ."id_pegawai".$separator."tanggalkeluar_sk".$separator."sifat_sk".$separator."no_sk".$separator."tanggalsurat_sk".$separator."asal_sk".$separator ."perihal_sk".$separator ."lampiran_sk".$separator."gambar".$separator."catatan_sk".$separator."bagian_sk".$separator."status_sk".$separator."status_bagian".$separator ."lokasi_sk".$separator ; 
    $buffer .= $newline; 
    
  $sql="select `id_sk`,`id_pegawai`,`tanggalkeluar_sk`,`sifat_sk`,`no_sk`,`tanggalsurat_sk`,`asal_sk`,`perihal_sk`,`lampiran_sk`,`gambar`,`catatan_sk`,`bagian_sk`,`status_sk`,`status_bagian`,`lokasi_sk` from `$tbsuratkeluar` where bagian_sk = '$bag' order by `id_sk` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id_sk"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["id_pegawai"];$buffer .= "\"".$value."\"".$separator;
					$value=$d["tanggalkeluar_sk"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["sifat_sk"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["tanggalsurat_sk"];$buffer .= "\"".$value."\"".$separator;
					$value=$d["asal_sk"];$buffer .= "\"".$value."\"".$separator;   
					$value=$d["perihal_sk"];$buffer .= "\"".$value."\"".$separator;  
					$value=$d["lampiran_sk"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["gambar"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["catatan_sk"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["bagian_sk"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["status_sk"];$buffer .= "\"".$value."\"".$separator;
					$value=$d["status_bagian"];$buffer .= "\"".$value."\"".$separator;  
					$value=$d["lokasi_sk"];$buffer .= "\"".$value."\"".$separator; 
					
				$buffer .= $newline; 
		}	
  }
  else{
    $buffer .= $newline; 
	  }
    header("Content-type: application/vnd.ms-excel"); 
    header("Content-Length: ".strlen($buffer)); 
    header("Content-Disposition: attachment; filename=report.csv"); 
    header("Expires: 0"); 
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
    header("Pragma: public"); 

    print $buffer;
	
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