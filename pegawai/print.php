<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data pegawai:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_pegawai</td>
    <th width="25%"><center>nama_pegawai</td>
    <th width="25%"><center>bagian_pegawai</td>
    <th width="20%"><center>email_pegawai</td>
    <th width="10%"><center>username_pegawai</td>
    <th width="5%"><center>status_pegawai</td>
  </tr>
<?php  
  $sql="select * from `$tbpegawai` order by `id_pegawai` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_pegawai=$d["id_pegawai"];
				$nama_pegawai=$d["nama_pegawai"];
				$bagian_pegawai=$d["bagian_pegawai"];
				$email_pegawai=$d["email_pegawai"];
				$username_pegawai=$d["username_pegawai"];
				$password_pegawai=$d["password_pegawai"];
				$status_pegawai=$d["status_pegawai"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_pegawai</td>
				<td>$nama_pegawai</td>
				<td>$bagian_pegawai</td>
				<td>$email_pegawai</td>
				<td>$username_pegawai</td>
				<td>$password_pegawai</td>
				<td>$status_pegawai</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_pegawai</td>
				<td>$nama_pegawai</td>
				<td>$bagian_pegawai</td>
				<td>$email_pegawai</td>
				<td>$username_pegawai</td>
				<td>$password_pegawai</td>
				<td>$status_pegawai</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pegawai belum tersedia...</blink></td></tr>";}
		
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

