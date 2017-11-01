<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "/konmysqli.php";
echo"<link href='./ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data suratmasuk:</h3>
 

<table width="100%" border="0">
 <tr bgcolor="#036">
    <th width="3%"><center>No</th>
    <th width="20%"><center>No Urut</th>
    <th width="10%"><center>No Surat</th>
    <th width="10%"><center>Tanggal Terima</th>
    <th width="30%"><center>Asal Surat</th>
    <th width="15%"><center>Sifat Surat</th>
    <th width="10%"><center>Perihal</th>
    <th width="10%"><center>Lampiran</th>
    <th width="10%"><center>Pengelola</th>
    <th width="10%"><center>Tujuan Surat</th>
    <th width="10%"><center>Deadline</th>
    <th width="10%"><center>Nama File</th>
    
  </tr>
<?php  
  $sql="select * from `tb_surat` where tipe_surat = 'sm' order by id_surat DESC";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_sm = $d['id_surat'];
				$tt = $d['tanggalterima_surat'];
                $nourut = $d['nourut_surat'];
                $no = $d['no_surat'];
                $tgl = $d['tanggal_surat'];
                $sifat = $d['sifat_surat'];
                $status = $d['status_surat'];
                $tipe = $d['tipe_surat'];
                $asal = $d['asal_surat'];
                $perihal = $d['perihal_surat'];
                $lampiran = $d['lampiran_surat'];
                $tujuan = $d['tujuan_surat'];
                $pengelola = $d['pengelola_surat'];
                $deadline = $d['deadline_surat'];
                $file = $d['file_surat'];
				
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$nourut</td>
				<td>$no</td>
				<td>$tt</td>
				<td>$asal</td>
				<td>$sifat</td>
				<td>$perihal</td>
				<td>$lampiran</td>
				<td>$pengelola</td>
                <td>$tujuan</td>
				<td>$deadline</td>
				<td>$file</td>
				
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<<td>$no</td>
				<td>$nourut</td>
				<td>$no</td>
				<td>$tt</td>
				<td>$asal</td>
				<td>$sifat</td>
				<td>$perihal</td>
				<td>$lampiran</td>
				<td>$pengelola</td>
                <td>$tujuan</td>
				<td>$deadline</td>
				<td>$file</td>

				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data suratmasuk belum tersedia...</blink></td></tr>";}
		
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

