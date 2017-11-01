<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$bag = $_SESSION['bagian'];
?>


<h3><center>Laporan data suratkeluar:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_sk</td>
    <th width="25%"><center>id_pegawai</td>
    <th width="5%"><center>tanggalkeluar_sk</td>
    <th width="5%"><center>sifat_sk</td>
    <th width="5%"><center>no_sk</td>
    <th width="5%"><center>tanggalsurat_sk</td>
    <th width="5%"><center>asal_sk</td>
    <th width="25%"><center>perihal_sk</td>
    <th width="20%"><center>lampiran_sk</td>
    <th width="5%"><center>gambar</td>
    <th width="5%"><center>catatan_sk</td>
    <th width="5%"><center>bagian_sk</td>
    <th width="5%"><center>status_sk</td>
    <th width="5%"><center>status_bagian</td>
    <th width="10%"><center>lokasi_sk</td>
    
  </tr>
<?php  
  $sql="select * from `$tbsuratkeluar` bagian_sk = '$bag' order by `id_sk` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
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
				
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_sk</td>
				<td>$id_pegawai</td>
				<td>$tanggalkeluar_sk</td>
				<td>$sifat_sk</td>
				<td>$no_sk</td>
				<td>$tanggalsurat_sk</td>
				<td>$asal_sk</td>
				<td>$perihal_sk</td>
				<td>$lampiran_sk</td>
				<td>$gambar</td>
				<td>$catatan_sk</td>
				<td>$bagian_sk</td>
				<td>$status_sk</td>
				<td>$status_bagian</td>
				<td>$lokasi_sk</td>
				
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_sk</td>
				<td>$id_pegawai</td>
				<td>$tanggalkeluar_sk</td>
				<td>$sifat_sk</td>
				<td>$no_sk</td>
				<td>$tanggalsurat_sk</td>
				<td>$asal_sk</td>
				<td>$perihal_sk</td>
				<td>$lampiran_sk</td>
				<td>$gambar</td>
				<td>$catatan_sk</td>
				<td>$bagian_sk</td>
				<td>$status_sk</td>
				<td>$status_bagian</td>
				<td>$lokasi_sk</td>

				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data suratkeluar belum tersedia...</blink></td></tr>";}
		
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

</table>

