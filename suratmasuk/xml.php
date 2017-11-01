<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbsuratmasuk`";
if(getJum($conn,$sql)>0){
	print "<suratmasuk>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_sm=$d["id_sm"];
				$id_pegawai=$d["id_pegawai"];
				$tanggalterima_sm=$d["tanggalterima_sm"];
				$sifat_sm=$d["sifat_sm"];
				$no_sm=$d["no_sm"];
				$tanggalsurat_sm=$d["tanggalsurat_sm"];
				$asal_sm=$d["asal_sm"];
				$perihal_sm=$d["perihal_sm"];
				$lampiran_sm=$d["lampiran_sm"];
				$gambar=$d["gambar"];
				$catatan_sm=$d["catatan_sm"];
				$bagian_sm=$d["bagian_sm"];
				$status_sm=$d["status_sm"];
				$status_bagian=$d["status_bagian"];
			    $lokasi_sm=$d["lokasi_sm"];
				
												
				print "<record>\n";
				print "  <id_pegawai>$id_pegawai</id_pegawai>\n";
				print "  <$tanggalterima_sm>$tanggalterima_sm</$tanggalterima_sm>\n";
				print "  <sifat_sm>$sifat_sm</sifat_sm>\n";
				print "  <no_sm>$no_sm</no_sm>\n";
				print "  <tanggalsurat_sm>$tanggalsurat_sm</tanggalsurat_sm>\n";
				print "  <asal_sm>$asal_sm</asal_sm>\n";
				print "  <perihal_sm>$perihal_sm</perihal_sm>\n";
				print "  <lampiran_sm>$lampiran_sm</lampiran_sm>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <catatan_sm>$catatan_sm</catatan_sm>\n";
				print "  <bagian_sm>$bagian_sm</bagian_sm>\n";
				print "  <status_sm>$status_sm</status_sm>\n";
				print "  <status_bagian>$status_bagian</status_bagian>\n";
				print "  <lokasi_sm>$lokasi_sm</lokasi_sm>\n";
				
				print "  <id_sm>$id_sm</id_sm>\n";
				print "</record>\n";
			}
	print "</suratmasuk>\n";
}
else{
	$null="null";
	print "<suratmasuk>\n";
		print "<record>\n";
				print "  <id_pegawai>$null</id_pegawai>\n";
				print "  <tanggalterima_sm>$null</tanggalterima_sm>\n";
				print "  <sifat_sm>$null</sifat_sm>\n";
				print "  <no_sm>$null</no_sm>\n";
				print "  <tanggalsurat_sm>$null</tanggalsurat_sm>\n";
				print "  <asal_sm>$null</asal_sm>\n";
				print "  <perihal_sm>$null</perihal_sm>\n";
				print "  <lampiran_sm>$null</lampiran_sm>\n";
				print "  <gambar>$null</gambar>\n";
				print "  <catatan_sm>$null</catatan_sm>\n";
				print "  <bagian_sm>$null</bagian_sm>\n";
				print "  <status_sm>$null</status_sm>\n";
				print "  <status_bagian>$null</status_bagian>\n";
				print "  <lokasi_sm>$null</lokasi_sm>\n";
				
				print "  <id_sm>$null</id_sm>\n";
		print "</record>\n";
	print "</suratmasuk>\n";
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
	