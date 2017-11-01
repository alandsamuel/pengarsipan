<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id_sm".$separator ."id_pegawai".$separator."tanggalterima_sm".$separator."sifat_sm".$separator."no_sm".$separator."tanggalsurat_sm".$separator."asal_sm".$separator ."perihal_sm".$separator ."lampiran_sm".$separator."gambar".$separator."catatan_sm".$separator."bagian_sm".$separator."status_sm".$separator."status_bagian".$separator ."lokasi_sm".$separator ; 
    $buffer .= $newline; 
    
  $sql="select `id_sm`,`id_pegawai`,`tanggalterima_sm`,`sifat_sm`,`no_sm`,`tanggalsurat_sm`,`asal_sm`,`perihal_sm`,`lampiran_sm`,`gambar`,`catatan_sm`,`bagian_sm`,`status_sm`,`status_bagian`,`lokasi_sm` from `$tbsuratmasuk` order by `id_sm` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id_sm"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["id_pegawai"];$buffer .= "\"".$value."\"".$separator;
					$value=$d["tanggalterima_sm"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["sifat_sm"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["tanggalsurat_sm"];$buffer .= "\"".$value."\"".$separator;
					$value=$d["asal_sm"];$buffer .= "\"".$value."\"".$separator;   
					$value=$d["perihal_sm"];$buffer .= "\"".$value."\"".$separator;  
					$value=$d["lampiran_sm"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["gambar"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["catatan_sm"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["bagian_sm"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["status_sm"];$buffer .= "\"".$value."\"".$separator;
					$value=$d["status_bagian"];$buffer .= "\"".$value."\"".$separator;  
					$value=$d["lokasi_sm"];$buffer .= "\"".$value."\"".$separator; 
					
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