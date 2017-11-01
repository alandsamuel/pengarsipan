<?php

$tanggal=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Aktif";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('admin/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_berita` from `tb_berita` order by `id_berita` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="BR".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_berita"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $id_br=$idmax;
?>
<?php
if($_GET["pro"]=="ubah"){
	$id_berita=$_GET["kode"];
	$sql="select * from `tb_berita` where `id_berita`='$id_berita'";
	$d=getField($conn,$sql);
				$id_berita=$d["id_berita"];
				$judul=$d['judul'];
                $isi=$d['isi'];
                $pembuat=$d['pembuat'];
				$pro="ubah";		
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <center>
<table width="40%" class='wow bounceInLeft' data-wow-delay="2.5s">

    <h3>Form Tambah Berita</h3>
    <input type="text" name="id_berita" value="<?php echo $idmax;?>" HIDDEN>
    <br><br>
    <tr>
        <th colspan="2">Input Data</th>
    </tr>
    <tr>
        <td width="10%">Judul</td>
        <td><input type="text" name="judul" placeholder="Judul"></td>
    </tr>
    <tr>
        <td width="10%">Isi Berita</td>
        <td><textarea name="isi" cols="80%" rows="20"></textarea></td>
    </tr>
    <tr>
        <td width="10%">Pembuat Berita</td>
        <td><input type="text" value="<?php echo $_SESSION["cnama"];?>" DISABLED><input type="text" name="pembuat" value="<?php echo $_SESSION["cnama"];?>" HIDDEN></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center;"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <a href="?mnu=berita"><input type="button" id="Batal" value="Batal"/></a>
        </td>

    </tr>    

</table>
  </center>
</form>
<br />
Data Admin: 
| <a href="admin/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="admin/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <a href="admin/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#036">
    <th width="3%">No</td>
    <th width="10%">id_berita</td>
    <th width="20%">Judul</td>
    <th width="30%">Isi</td>
    <th width="20%">Pembuat</td>
    <th width="15%">Menu</td>
  </tr>
<?php  
  $sql="select * from `tb_berita` order by `id_berita` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

$sql2 = $sql." LIMIT $posawal,$batas";
$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
				$id_berita=$d["id_berita"];
				$judul=$d['judul'];
                $isi=$d['singkat'];
                $pembuat=$d['pembuat'];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td class='wow fadeIn' data-wow-delay='2.6s'>$no</td>
				<td class='wow fadeIn' data-wow-delay='2.7s'>$id_berita</td>
				<td class='wow fadeIn' data-wow-delay='2.8s'>$judul</td>
				<td class='wow fadeIn' data-wow-delay='2.9s'>$isi</td>
				<td class='wow fadeIn' data-wow-delay='3s'>$pembuat</td>";
				echo"</td>
				<td class='wow fadeIn' data-wow-delay='3.2s'><div align='center'>
<a href='?mnu=berita&pro=ubah&kode=$id_berita'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=berita&pro=hapus&kode=$id_berita'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data admin ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data berita belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=berita'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=berita'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=berita'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>
<?php
if(isset($_POST["Simpan"])){
	$pro=$_POST["pro"];
    
if($pro=="simpan"){

	$id_berita=$_POST["id_berita"];
	$judul=$_POST["judul"];
	$isi=$_POST["isi"];
	$pembuat=$_POST["pembuat"];
	$singkat=$isi;
    
$sql="INSERT INTO `tb_berita` (
`judul` ,
`isi` ,
`singkat` ,
`pembuat`
) VALUES (
'$judul',
'$isi', 
'$singkat',
'$pembuat'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data berhasil disimpan !');document.location.href='?mnu=berita';</script>";}
		else{echo"<script>alert('Error : ".mysqli_error($conn)." Data  gagal disimpan...');document.location.href='?mnu=berita';</script>";}
	}
	else{
	$sql="update `tb_berita` set `judul`='$judul',`isi`='$isi',`singkat`='$singkat',`pembuat`='$pembuat'  where `id_berita`='$id_berita'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data berhasil diubah !');document.location.href='?mnu=berita';</script>";}
		else{echo"<script>alert('Data gagal diubah...');document.location.href='?mnu=berita';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_admin=$_GET["kode"];
$sql="delete from `tb_berita` where `id_berita`='$kode_admin'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $kode_admin berhasil dihapus !');document.location.href='?mnu=berita';</script>";}
	else{echo"<script>alert('Data $kode_admin gagal dihapus...');document.location.href='?mnu=berita';</script>";}
}
?>

