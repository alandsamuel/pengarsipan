<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id_pegawai".$separator ."nama_pegawai".$separator ."bagian_pegawai".$separator ."email_pegawai".$separator ."username_pegawai".$separator ."password_pegawai".$separator ."status_pegawai".$separator; 
    $buffer .= $newline; 
    
  $sql="select `id_pegawai`,`nama_pegawai`,`bagian_pegawai`,`email_pegawai`,`username_pegawai`,`password_pegawai`,`status_pegawai` from `$tbpegawai` order by `id_pegawai` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id_pegawai"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nama_pegawai"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["bagian_pegawai"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["email_pegawai"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["username_pegawai"];$buffer .= "\"".$value."\"".$separator;
					$value=$d["password_pegawai"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["status_pegawai"];$buffer .= "\"".$value."\"".$separator; 
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