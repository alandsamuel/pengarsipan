<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbsuratkeluar`";
if(getJum($conn,$sql)>0){
	print "<suratkeluar>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_sk=$d["id_sk"];
				$id_pegawai=$d["id_pegawai"];
				$tanggalkeluar_sk=$d["tanggalkeluar_sk"];
				$sifat_sk=$d["sifat_sk"];
				$no_sk=$d["no_sk"];
				$tanggalsurat_sk=$d["tanggalsurat_sk"];
				$asal_sk=$d["asal_sk"];
				$perihal_sk=$d["perihal_sk"];
				$lampiran_sk=$d["lampiran_sk"];
				$gambar=$d["gambar"];
				$catatan_sk=$d["catatan_sk"];
				$bagian_sk=$d["bagian_sk"];
				$status_sk=$d["status_sk"];
				$status_bagian=$d["status_bagian"];
			    $lokasi_sk=$d["lokasi_sk"];
				
												
				print "<record>\n";
				print "  <id_pegawai>$id_pegawai</id_pegawai>\n";
				print "  <$tanggalkeluar_sk>$tanggalkeluar_sk</$tanggalkeluar_sk>\n";
				print "  <sifat_sk>$sifat_sk</sifat_sk>\n";
				print "  <no_sk>$no_sk</no_sk>\n";
				print "  <tanggalsurat_sk>$tanggalsurat_sk</tanggalsurat_sk>\n";
				print "  <asal_sk>$asal_sk</asal_sk>\n";
				print "  <perihal_sk>$perihal_sk</perihal_sk>\n";
				print "  <lampiran_sk>$lampiran_sk</lampiran_sk>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <catatan_sk>$catatan_sk</catatan_sk>\n";
				print "  <bagian_sk>$bagian_sk</bagian_sk>\n";
				print "  <status_sk>$status_sk</status_sk>\n";
				print "  <status_bagian>$status_bagian</status_bagian>\n";
				print "  <lokasi_sk>$lokasi_sk</lokasi_sk>\n";
				
				print "  <id_sk>$id_sk</id_sk>\n";
				print "</record>\n";
			}
	print "</suratkeluar>\n";
}
else{
	$null="null";
	print "<suratkeluar>\n";
		print "<record>\n";
				print "  <id_pegawai>$null</id_pegawai>\n";
				print "  <tanggalkeluar_sk>$null</tanggalkeluar_sk>\n";
				print "  <sifat_sk>$null</sifat_sk>\n";
				print "  <no_sk>$null</no_sk>\n";
				print "  <tanggalsurat_sk>$null</tanggalsurat_sk>\n";
				print "  <asal_sk>$null</asal_sk>\n";
				print "  <perihal_sk>$null</perihal_sk>\n";
				print "  <lampiran_sk>$null</lampiran_sk>\n";
				print "  <gambar>$null</gambar>\n";
				print "  <catatan_sk>$null</catatan_sk>\n";
				print "  <bagian_sk>$null</bagian_sk>\n";
				print "  <status_sk>$null</status_sk>\n";
				print "  <status_bagian>$null</status_bagian>\n";
				print "  <lokasi_sk>$null</lokasi_sk>\n";
				
				print "  <id_sk>$null</id_sk>\n";
		print "</record>\n";
	print "</suratkeluar>\n";
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
	