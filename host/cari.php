<?php
$pro="simpan";
$tanggalterima_sm=WKT(date("Y-m-d"));
$tanggalsurat_sm=WKT(date("Y-m-d"));

$gambar0="avatar.jpg";
$status="Aktif";
$bag=$_SESSION["bagian"];
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
  $sql="select `id_sm` from `$tbsuratmasuk` order by `id_sm` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kode="SMK".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_sm"];
   
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

<form action="" method="post" enctype="multipart/form-data">
    <center>
<table width="630">


<tr>
<th colspan="4"><label for="id_sm"><center>Cari Surat</center></label>
</tr>

<tr>
<td>Cari Data</td>
<td>:</td>
<td><input type="text" name="cari" placeholder="Cari"/> &nbsp; &nbsp; 
<select name="pilihan">
<option value="id_sm" Select>Nomor Surat</option>
<option value="tanggalterima_sm">Tanggal Surat</option>
<option value="asal_sm">Asal Surat</option>
<option value="bagian_sm">Tujuan Surat</option>
</select>
<select name="tb_cari">
<option value="sm" Select>Surat Masuk</option>
<option value="sk">Surat Keluar</option>
</select>
    <br><p style="color:red;">Untuk tanggal, formatnya : 2017-08-17</p></td>
</tr>
    
<tr>
<td>
<td>
<td colspan="2">	<input name="submit" type="submit" id="submit" value="Submit" />
        <a href="?mnu=cari"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
        </center>
</form>
<?php if($_POST['cari']!=NULL){ ?>
Data suratmasuk: 
| <a href="suratmasuk/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="suratmasuk/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="suratmasuk/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#036">
    <th width="3%"><center>no</th>
    <th width="10%"><center>kode</th>
    <th width="20%"><center>id_pegawai</th>
    <th width="10%"><center>tanggalterima</th>
    <th width="30%"><center>sifat</th>
    <th width="15%"><center>no</th>
    <th width="10%"><center>tanggalsurat</th>
    <th width="10%"><center>asal</th>
    <th width="10%"><center>perihal</th>
    <th width="10%"><center>lampiran</th>
    
    <th width="10%"><center>catatan</th>
    <th width="10%"><center>bagian</th>
    <th width="10%"><center>status</th>
    <th width="10%"><center>status bagian</th>
    <th width="10%"><center>lokasi_sm</th>
    <th width="10%"><center>gambar</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php
    $tb = $_POST['tb_cari'];
    $cari = $_POST['cari'];
    $pilihan = $_POST['pilihan'];
    if($tb=='sm'){
    $sql="select * from `$tbsuratmasuk` where `$pilihan` = '$cari' order by `id_sm` desc";
    } else {
    switch($pilihan){
        case 'tanggalterima_sm' :
            $pilihan = 'tanggalsurat_sk';
            break;
        
        case 'asal_sm' :
            $pilihan = 'asal_sk';
            break;
            
        case 'bagian_sm' :
            $pilihan = 'bagian_sk';
            break;
            
        default:
            $pilihan = 'id_sk';
               
    }
    $sql="select * from `$tbsuratkeluar` where `$pilihan` = '$cari' order by `id_sk` desc";
    }
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 2;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
        
		foreach($arr as $d) {
                if($tb=='sm'){
				$id_sm=$d["id_sm"];
				$id_pegawai=$d["id_pegawai"];
				$tanggalterima_sm=WKT($d["tanggalterima_sm"]);
				$sifat_sm=$d["sifat_sm"];
				$no_sm=$d["no_sm"];
				$tanggalsurat_sm=WKT($d["tanggalsurat_sm"]);
				$asal_sm=$d["asal_sm"];
				$perihal_sm=$d["perihal_sm"];
				$lampiran_sm=$d["lampiran_sm"];
				
				$catatan_sm=$d["catatan_sm"];
				$bagian_sm=$d["bagian_sm"];
				$status_sm=$d["status_sm"];
				
				$status_bagian=$d["status_bagian"];
				$lokasi_sm=$d["lokasi_sm"];
				$gambar=$d["gambar_sm"];
				$gambar0=$d["gambar"];
                } else {
                $id_sm=$d["id_sk"];
				$id_pegawai=$d["id_pegawai"];
				$tanggalterima_sm=WKT($d["tanggalkeluar_sk"]);
				$sifat_sm=$d["sifat_sk"];
				$no_sm=$d["no_sk"];
				$tanggalsurat_sm=WKT($d["tanggalsurat_sk"]);
				$asal_sm=$d["asal_sk"];
				$perihal_sm=$d["perihal_sk"];
				$lampiran_sm=$d["lampiran_sk"];
				
				$catatan_sm=$d["catatan_sk"];
				$bagian_sm=$d["bagian_sk"];
				$status_sm=$d["status_sk"];
				
				$status_bagian=$d["status_bagian"];
				$lokasi_sm=$d["lokasi_sk"];
				$gambar=$d["gambar_sk"];
				$gambar0=$d["gambar"];    
                }
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_sm</td>
				<td>$id_pegawai</td>
				<td>$tanggalterima_sm</td>
				<td>$sifat_sm</td>
				<td>$no_sm</td>
				<td>$tanggalsurat_sm</td>
				<td>$asal_sm</td>
				<td>$perihal_sm</td>
				<td>$lampiran_sm</td>
				<td>$catatan_sm</td>
				<td>$bagian_sm</td>
				<td>$status_sm</td>
				
				<td>$status_bagian</td>
				<td>$lokasi_sm</td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"suratmasuk/zoom.php?id=$id_sm\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
echo"</td>
				<td align='center'>
<a href='?mnu=suratmasuk&pro=ubah&kode=$id_sm'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=suratmasuk&pro=hapus&kode=$id_sm'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_pegawai pada data suratmasuk ?..\")'></a></td>
				</tr>";
			
			$no++;
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=cari'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=cari'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=cari'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
<?php } ?>
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

<?php
if($_GET["pro"]=="hapus"){
$id_sm=$_GET["kode"];
$sql="delete from `$tbsuratmasuk` where `id_sm`='$id_sm'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data suratmasuk $id_sm berhasil dihapus !');document.location.href='?mnu=suratmasuk';</script>";}
else{echo"<script>alert('Data suratmasuk $id_sm gagal dihapus...');document.location.href='?mnu=suratmasuk';</script>";}
}
?>

