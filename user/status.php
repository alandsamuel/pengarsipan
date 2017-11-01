<?php
$pro="simpan";
$tanggalkeluar_sk=WKT(date("Y-m-d"));
$tanggalsurat_sk=WKT(date("Y-m-d"));

$gambar0="avatar.jpg";
$status="Aktif";
$bag = $_SESSION['bagian'];
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>typeahead.bundle.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>


    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggalkeluar_sk").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggalsurat_sk").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('suratkeluar/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, tanggalsurat_sk=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_surat` from `$tbsurat` order by `id_surat` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kode="SRT".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_sk"];
   
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
  $id_surat=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_sk=$_GET["kode"];
	$sql="select * from `$tbsuratkeluar` where `id_surat`='$id_surat'";
	$d=getField($conn,$sql);
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
				$pro="ubah";		
}
?>

<?php

$sql="select * from `$tbsurat`";
$gj = getJum($conn,$sql);
$id = $gj+2;

if($nourut == NULL){
    $nourut = $id;
} else {
    $nourut = $d['nourut_surat'];
}
?>

<form action="" method="post" enctype="multipart/form-data" >
<center>
<table><br>
<h3>Tambah Data Surat Keluar</h3>
<input type="text" name="id_surat" value="SR<?php echo $id;?>" HIDDEN>
<tr>
    <td style="width:100px;border: 0px">Tanggal Terima</td>
    <td style="width:500px;border: 0px"> &nbsp;
    <input type="date" name="tanggal_terima" <?php echo $tt;?>> <p style="color:red;margin-bottom:0;padding:0;">* FORMAT = YYYY-MM-DD *</p></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Sifat Surat </td>
    <td style="width:100px;border: 0px">&nbsp; <select name="sifat_surat" style="width:221px;">
        <?php 
        foreach ($sft as $sf => $sf_val) {
            if($sf_val==$sifat){
        ?>
        <option value="<?php echo $sv_val;?>" SELECTED><?php echo $sf; ?></option>
        <?php } else { ?>
        <option value="<?php echo $sf_val;?>"><?php echo $sf;?></option>
        <?php } } ?>
        </select></td>
</tr> 
<tr>
    <td style="width:100px;border: 0px">Nomor urut</td>
    <td style="width:100px;border: 0px">&nbsp; <input type="text" name="nourut_surat" placeholder="No Urut" value="<?php echo $nourut;?>"></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">No Surat</td>
    <td style="width:100px;border: 0px">&nbsp; <input type="text" name="no_surat" placeholder="No Surat" value="<?php echo $no;?>"></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Klasifikasi Surat</td>
    <td style="width:100px;border: 0px">&nbsp;
    <select name="klasifikasi">
        <option>Klasifikasi Surat</option>
        <?php 
        foreach ($kls as $k => $k_val) {
            if($sf_val==$sifat){
        ?>
        <option value="<?php echo $k_val;?>" SELECTED><?php echo $k; ?></option>
        <?php } else { ?>
        <option value="<?php echo $k_val;?>"><?php echo $k;?></option>
        <?php } } ?>
        </select></td>
    </select>
    </td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Tanggal Surat</td>
    <td style="width:500px;border: 0px"> &nbsp;
    <input type="date" name="sampai" value="<?php echo $tgl;?>"><p style="color:red;margin-bottom:0;padding:0;">* FORMAT = YYYY-MM-DD *</p></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Perihal</td>
    <td style="width:400px;border: 0px">&nbsp; <textarea name="perihal_surat" cols="50" rows="2" value="<?php echo $perihal; ?>"></textarea></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Lampiran</td>
    <td style="width:400px;border: 0px">&nbsp; <textarea name="lampiran_surat" cols="50" rows="2" value="<?php echo $lampiran; ?>"></textarea></td>
</tr><tr>
    <td style="width:100px;border: 0px">Catatan</td>
    <td style="width:400px;border: 0px">&nbsp; <textarea name="catatan_surat" cols="50" rows="2" value="<?php echo $catatan; ?>"></textarea></td>
</tr><tr>
    <td style="width:100px;border: 0px">Lokasi Surat</td>
    <td style="width:400px;border: 0px">&nbsp; <textarea name="lokasi_surat" cols="50" rows="2" value="<?php echo $lokasi; ?>"></textarea></td>
</tr>
</table><br>
<b>Ditujukan Kepada :</b>
<br>
<table style="border:0px">
<tr>
    <td style="width:100px;border: 0px">Pejabat</td>
    <td style="width:400px;border: 0px">&nbsp; 
    <ul style="columns: 2;  -webkit-columns: 2;  -moz-columns: 2;">
    <?php foreach($dir as $d => $d_val){ $a=1; $b=2;?>
        <?php if($d_val == $tujuan){ ?>
        <li><input type="checkbox" name="tujuan_surat" value="<?php echo $d_val;?>" SELECTED>&nbsp; <?php echo $d;?></li>
        <?php } else { ?>
        <li><input type="checkbox" name="tujuan_surat" value="<?php echo $d_val;?>">&nbsp; <?php echo $d;?></li>
    <?php } }?>
    </ul>
    </td>
</tr>
<tr>
    <td style="width:100px;border: 0px"><b>Pengelola :</b></td>
    <td style="width:400px;border: 0px">&nbsp; 
    <ul style="columns: 2;  -webkit-columns: 2;  -moz-columns: 2;">
    <?php foreach($png as $p => $p_val){ $a=1; $b=2;?>
        <?php if($d_val == $tujuan){ ?>
        <li><input type="checkbox" name="pengelola_surat" value="<?php echo $p_val;?>" SELECTED>&nbsp; <?php echo $p;?></li>
        <?php } else { ?>
        <li><input type="checkbox" name="pengelola_surat" value="<?php echo $p_val;?>">&nbsp; <?php echo $p;?></li>
    <?php } }?>
    </ul>
    </td>    
        
</tr>
    <br>
<tr>
    <td style="width:100px;border: 0px">Deadline Surat</td>
    <td style="width:400px;border: 0px"> &nbsp;
    <input type="date" name="deadline" value="<?php echo $deadline;?>"></td>
</tr>
<tr></tr>
<tr>
    <td style="width:100px;border: 0px">File Surat</td>
    <td style="width:400px;border: 0px">&nbsp; <input type="file" name="file_surat" value="<?php echo $file;?>"></td>
</tr>
<tr>
</tr>
</table><br>
<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
<input type="reset" value="Reset">
<input type="text" value="sk" name="tipe_surat" HIDDEN><br>
    </center>
    </form>

    <br>

<hr>
<br>

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
    <th width="8%"><center>Lokasi</th>
    <th width="8%"><center>Deadline</th>
    <th width="8%"><center>Nama File</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php 
    $tipe = 'sk';
  $sql="select * from `$tbsurat` where tipe_surat = '$tipe' and asal_surat = '$bag' order by id_surat DESC";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 4;
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
				<td><a href='ypathfile/$file'>$file</a></td> ";
echo"
				<td align='center'>
<a href='?mnu=status&pro=hapus&kode=$id_sk'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_pegawai pada data suratkeluar ?..\")'></a></td>
				</tr>";
			
			$no1++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data suratkeluar belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=status'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=status'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=status'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

<?php
$id_srt = $_GET['kode'];
$ttgl = $_POST['tgl1'];
    $tbln = $_POST['bln1'];
    $tthn = $_POST['thn1'];
    $terima = $tthn.'-'.$tbln.'-'.$ttgl;
    
    $stgl = $_POST['tgl2'];
    $sbln = $_POST['bln2'];
    $sthn = $_POST['thn2'];
    $sampai = $sthn.'-'.$sbln.'-'.$stgl;
    
    $kunci = $_POST['cari'];
    $kate = $_POST['pilihan'];
    


if(isset($_POST["Simpan"])){
	$pro=$_POST["pro"];
	//$id_surat=$_POST["id_surat"];
    $tt = $_POST['tanggal_terima'];
    $klasifikasi = $_POST['klasifikasi'];
    $nourut_surat = $_POST['nourut_surat'];
    $sifat_surat = $_POST['sifat_surat'];
    $no_surat = $_POST['no_surat'];
    $tanggal_surat = $_POST['sampai'];
    $asal_surat = $_POST['asal_surat'];
    $perihal_surat = $_POST['perihal_surat'];
    $lampiran_surat = $_POST['lampiran_surat'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $pengelola_surat = $_POST['pengelola_surat'];
    $catatan_surat = $_POST['catatan_surat'];
    $deadline = $_POST['deadline'];
    $file_surat = 'nodata';
    
    $sql="select * from `$tbsurat`";
    $gj = getJum($conn,$sql);
    $id = $gj+1;
    
	$id_surat = 'SR'.$id;
    
	if ($_FILES["file_surat"] != "") {
		@copy($_FILES["file_surat"]["tmp_name"],"$YPATH/".$_FILES["file_surat"]["name"]);
		$file_surat=$_FILES["file_surat"]["name"];
		} 
	else {$gambar=$file0;}
	if(strlen($file_surat)<1){$file_surat=$file0;}

	
	
if($pro=="simpan"){
$sql=" INSERT INTO `tb_surat`(
`id_surat`, 
`tipe_surat`, 
`klasifikasi_surat`,
`tanggalterima_surat`, 
`nourut_surat`, 
`no_surat`, 
`tanggal_surat`,
`sifat_surat`, 
`asal_surat`, 
`perihal_surat`, 
`lampiran_surat`, 
`catatan`, 
`tujuan_surat`,
`pengelola_surat`,
`lokasi_surat`, 
`deadline_surat`,
`file_surat`
) VALUES (
'$id_surat',
'sk',
'$klasifikasi',
'$tt', 
'$nourut_surat', 
'$no_surat', 
'$tanggal_surat', 
'$sifat_surat', 
'$bag', 
'$perihal_surat', 
'$lampiran_surat',
'$catatan_surat',
'$tujuan_surat',
'$pengelola_surat',
'$lokasi',
'$deadline',
'$file_surat'
)";
    
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data $id_surat berhasil disimpan !');document.location.href='?mnu=status';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
	
/* $simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_surat berhasil disimpan !');document.location.href='?mnu=suratmasuk';</script>";}
		else{ echo"<script>alert('Data $id_surat gagal disimpan...');document.location.href='?mnu=suratmasuk';</script>";} */
	}	else{
$sql=" INSERT INTO `$tb_surat`(
`id_surat`, 
`tipe_surat`, 
`tanggalterima_surat`, 
`nourut_surat`, 
`no_surat`, 
`tanggal_surat`,
`sifat_surat`, 
`status_surat`, 
`asal_surat`, 
`perihal_surat`, 
`lampiran_surat`, 
`catatan`, 
`tujuan_surat`,
`pengelola_surat`, 
`deadline_surat`, 
`file_surat`
) VALUES (
'$id_surat',
'sk', 
'$tt', 
'$nourut_surat', 
'$no_surat', 
'$tanggal_surat', 
'$sifat_surat', 
'$status_surat', 
'$asal_surat', 
'$perihal_surat', 
'$lampiran_surat',
'$catatan_surat',
'$tujuan_surat',
'$pengelola_surat',
'$deadline_surat',
'$file_surat'
) where `id_surat` = '$id_surat'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_surat berhasil diubah !');document.location.href='?mnu=suratkeluar';</script>";}
	else{echo"<script>alert('Data $id_surat gagal diubah...');document.location.href='?mnu=suratmasuk';</script>";}
	}//else simpan
}
?>


<?php
if($_GET["pro"]=="hapus"){
$id_sm=$_GET["kode"];
$sql="delete from `$tbsurat` where `id_surat`='$id_sm'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data suratmasuk $id_sm berhasil dihapus !');document.location.href='?mnu=suratmasuk';</script>";}
else{echo"<script>alert('Data suratmasuk $id_sm gagal dihapus...');document.location.href='?mnu=suratmasuk';</script>";}
}
?>