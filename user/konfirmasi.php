<?php
$tanggalterima_sm=WKT(date("Y-m-d"));
$tanggalsurat_sm=WKT(date("Y-m-d"));

$gambar0="avatar.jpg";
$status="Aktif";
$bag=$_SESSION["bagian"];
$pro = $_GET['pro'];
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggalterima_sm").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggalsurat_sm").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('suratmasuk/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, tanggalsurat_sm=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_surat` from `$tbsuratmasuk` order by `id_surat` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kode="SMK".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_surat"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kode"."00".$urut;}
     else if($urut<100){$idmax="$kode"."0".$urut;}
     else{$idmax="$kode".$urut;}
    }//==
    else{
     $idmax="$kode"."001";
     }   
   }//jum>0
  else{$idmax="$kode"."001";}
  $id_sm=$idmax;
?>

<?php
if($pro=="konf"){
    $id_surat = $_GET['kode'];
    
    $sql = "update `tb_surat` set `konfirmasi` = 1 where `id_surat` = '$id_surat'";
    
    if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data $id_sm berhasil diganti !');document.location.href='?mnu=konfirmasi';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>

<?php
if($_GET["pro"]=="ubah"){
	$id_sm=$_GET["kode"];
	$sql="select * from `$tbsurat` where `id_surat`='$id_sm'";
	$d=getField($conn,$sql);
				    $id_sk = $d['id_surat'];
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
				$pro="ubah";		



} else {
echo '<center>';
echo '<marquee><p style="color:darkred;font-weight:bold;">Untuk mengkonfirmasi terusan, klik icon + pada data yang ingin di proses</p></marquee>';
echo '<form action="" method="post" enctype="multipart/form-data" style="display:none;">';
echo '<table>';
}
?>
<form action="" method="post" enctype="multipart/form-data">
<center><br>
<h2>Terusan Surat</h2>
<hr>
    <br>
<?php $id_srt = $_GET['kode']; ?>
ID Surat : <input type="text" value="<?php echo $id_srt; ?>" DISABLED>
<br>
<br>
<b>Ditujukan Kepada :</b>
<br>
<table style="border:0px">
<tr>
    <td style="width:100px;border: 0px">Pejabat</td>
    <td style="width:400px;border: 0px">&nbsp; 
    <ul style="columns: 2;  -webkit-columns: 2;  -moz-columns: 2;">
    <?php foreach($dir as $d => $d_val){ $a=1; $b=2;?>
        <li><input type="checkbox" name="tujuan_surat" value="<?php echo $d_val;?>">&nbsp; <?php echo $d;?></li>
    <?php } ?>
    </ul>
    </td>
</tr>
<tr>
    <td style="width:100px;border: 0px"><b>Pengolah :</b></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Pengolah</td>
    <td style="width:400px;border: 0px">&nbsp; 
    <ul style="columns: 2;  -webkit-columns: 2;  -moz-columns: 2;">
    <?php foreach($png as $p => $p_val){ $a=1; $b=2;?>
        <li><input type="checkbox" name="pengolah_surat" value="<?php echo $p_val;?>">&nbsp; <?php echo $p;?></li>
    <?php } ?>
    </ul>
    </td>    
        
</tr>
<tr>
</tr>
</table><br><input type="text" name="pro" value="konfirmasi" HIDDEN>    
<input type="submit" value="Simpan"> <input type="reset" value="Reset">

</center>
</form>
</center>
<br><br>
<br>

*klik pada nama file untuk mendownload file*
<table width="100%" border="0">
  <tr bgcolor="#036">
    <th width="3%"><center>No</th>
    <th width="5%"><center>No Urut</th>
    <th width="10%"><center>No Surat</th>
    <th width="10%"><center>Tanggal Terima</th>
    <th width="10%"><center>Asal Surat</th>
    <th width="10%"><center>Sifat Surat</th>
    <th width="20%"><center>Perihal</th>
    <th width="10%"><center>Lampiran</th>
    <th width="8%"><center>Pengelola</th>
    <th width="8%"><center>Lokasi</center></th>
    <th width="8%"><center>Deadline</th>
    <th width="8%"><center>Nama File</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbsurat` where tujuan_surat = '$bag' and konfirmasi = '0' ORDER by `id_surat` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 7;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no1 = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_sk = $d['id_surat'];
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
                $lokasi = $d['lokasi_surat'];
                $pengelola = $d['pengelola_surat'];
                $deadline = $d['deadline_surat'];
                $file = $d['file_surat'];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no1</td>
				<td>$nourut</td>
				<td>$no</td>
				<td>$tt</td>
				<td>$asal</td>
				<td>$sifat</td>
				<td>$perihal</td>
				<td>$lampiran</td>
				<td>$pengelola</td>
                <td>$lokasi</td>
				<td>$deadline</td>
				<td><a href='ypathfile/$file'>$file</a></td>  ";

if($status_surat !='diterima'){
echo"</td>
				<td align='center'>
<a href='?mnu=konfirmasi&pro=ubah&kode=$id_sk'><img src='ypathicon/u.png' alt='teruskan'></a>
<a href='?mnu=konfirmasi&pro=konf&kode=$id_sk'><img src='ypathicon/konfirmasi.png' alt='konfirmasi' 
onClick='return confirm(\"Apakah Anda benar-benar akan konfirmasi $id_pegawai pada data suratmasuk ?..\")'></a></td>
				</tr>";
}else{
echo"</td>
				<td align='center'>
<a href='?mnu=konfirmasi&pro=ubah&kode=$id_sm'><img src='ypathicon/u.png' alt='teruskan'></a>
				</tr>";   
}
			
			$no1++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data suratmasuk belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=konfirmasi'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=konfirmasi'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=konfirmasi'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

<?php


	

if($pro=="konfirmasi"){
$id_sm = $_GET['kode'];
$pengolah = $_POST['pengolah'];
$tujuan = $_POST['tujuan'];
$sql="update `$tbsurat` set 

`pengelola_surat`='$pengolah',
`tujuan_surat`='$tujuan'

where `id_surat`='$id_sm'";
    
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data $id_sm berhasil diteruskan !');document.location.href='?mnu=konfirmasi';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
    
/* $ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_sm berhasil dikonfirmasi !');document.location.href='?mnu=konfirmasi';</script>";}
	else{echo"<script>alert('Data $id_sm gagal diubah...');document.location.href='?mnu=konfirmasi';</script>";} */
	}//else simpan

?>



<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_sm=strip_tags($_POST["id_sm"]);
	$id_sm0=strip_tags($_POST["id_sm0"]);
	$id_pegawai=strip_tags($_POST["id_pegawai"]);
	$tanggalterima_sm=BAL(strip_tags($_POST["tanggalterima_sm"]));
	$sifat_sm=strip_tags($_POST["sifat_sm"]);
	$no_sm=strip_tags($_POST["no_sm"]);
	$tanggalsurat_sm=BAL(strip_tags($_POST["tanggalsurat_sm"]));
	$asal_sm=strip_tags($_POST["asal_sm"]);
	$perihal_sm=strip_tags($_POST["perihal_sm"]);
	$lampiran_sm=strip_tags($_POST["lampiran_sm"]);
	$catatan_sm=strip_tags($_POST["catatan_sm"]);
	$bagian_sm=strip_tags($_POST["bagian_sm"]);
	$status_sm=strip_tags($_POST["status_sm"]);
	$status_bagian=strip_tags($_POST["status_bagian"]);
	$lokasi_sm=strip_tags($_POST["lokasi_sm"]);
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}

	
	
if($pro=="simpan"){
$sql=" INSERT INTO `tb_suratmasuk` (
`id_sm` ,
`id_pegawai` ,
`tanggalterima_sm` ,
`sifat_sm` ,
`no_sm` ,
`tanggalsurat_sm`,
`asal_sm`,
`perihal_sm`,
`lampiran_sm`,
`catatan_sm`,
`bagian_sm`,
`status_sm`,
`status_bagian`,
`lokasi_sm`, 
`gambar_sm`
) VALUES (
'$id_sm', 
'$id_pegawai', 
'$tanggalterima_sm',
'$sifat_sm',
'$no_sm',
'$tanggalsurat_sm',
'$asal_sm',
'$perihal_sm',
'$lampiran_sm',
'$catatan_sm',
'$bagian_sm',
'$status_sm',
'$status_bagian',
'$lokasi_sm',
'$gambar'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_sm berhasil disimpan !');document.location.href='?mnu=suratmasuk';</script>";}
		else{echo"<script>alert('Data $id_sm gagal disimpan...');document.location.href='?mnu=suratmasuk';</script>";}
	}
	else{
$sql="update `$tbsuratmasuk` set 
`id_pegawai`='$id_pegawai',
`tanggalterima_sm`='$tanggalterima_sm' ,
`sifat_sm`='$sifat_sm',
`no_sm`='$no_sm',
`tanggalsurat_sm`='$tanggalsurat_sm',
`asal_sm`='$asal_sm',
`perihal_sm`='$perihal_sm',
`lampiran_sm`='$lampiran_sm',

`catatan_sm`='$catatan_sm',
`bagian_sm`='$bagian_sm',
`status_sm`='$status_sm',

`status_bagian`='$status_bagian',
`lokasi_sm`='$lokasi_sm',
`gambar`='$gambar' 
where `id_sm`='$id_sm0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_sm berhasil diubah !');document.location.href='?mnu=suratmasuk';</script>";}
	else{echo"<script>alert('Data $id_sm gagal diubah...');document.location.href='?mnu=suratmasuk';</script>";}
	}//else simpan
}
?>


