<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpegawai`";
if(getJum($conn,$sql)>0){
	print "<pegawai>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_pegawai=$d["id_pegawai"];
				$nama_pegawai=$d["nama_pegawai"];
				$bagian_pegawai=$d["bagian_pegawai"];
				$email_pegawai=$d["email_pegawai"];
			    $username_pegawai=$d["username_pegawai"];
				$password_pegawai=$d["password_pegawai"];
				$status_pegawai=$d["status_pegawai"];
												
				print "<record>\n";
				print "  <nama_pegawai>$nama_pegawai</nama_pegawai>\n";
				print "  <bagian_pegawai>$bagian_pegawai</bagian_pegawai>\n";
				print "  <email_pegawai>$email_pegawai</email_pegawai>\n";
				print "  <username_pegawai>$username_pegawai</username_pegawai>\n";
				print "  <password_pegawai>$username_pegawai</password_pegawai>\n";
				print "  <status_pegawai>$status_pegawai</status_pegawai>\n";
				print "  <id_pegawai>$id_pegawai</id_pegawai>\n";
				print "</record>\n";
			}
	print "</pegawai>\n";
}
else{
	$null="null";
	print "<pegawai>\n";
		print "<record>\n";
				print "  <nama_pegawai>$null</nama_pegawai>\n";
				print "  <bagian_pegawai>$null</bagian_pegawai>\n";
				print "  <email_pegawai>$null</email_pegawai>\n";
				print "  <username_pegawai>$null</username_pegawai>\n";
				print "  <password_pegawai>$null</password_pegawai>\n";
				print "  <status_pegawai>$null</status_pegawai>\n";
				print "  <id_pegawai>$null</id_pegawai>\n";
		print "</record>\n";
	print "</pegawai>\n";
	}
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
	