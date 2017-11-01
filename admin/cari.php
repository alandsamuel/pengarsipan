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


<form action="" method="post" enctype="multipart/form-data">
    <center>
    <br>
<h3>Lihat / Cari Data Surat Masuk</h3>
        <hr>
<table style="border:0px">
<tr>
    <td style="width:100px;border: 0px">Kata Kunci *</td>
    <td style="width:400px;border: 0px"><input type="text" name="cari"> &nbsp; Kategori &nbsp;
    <select name="pilihan">
<option value="id_surat" Select>ID Surat</option>
<option value="asal_surat">Asal Surat</option>
<option value="tujuan_surat">Tujuan Surat</option>
</select></td>
</tr>        
<tr>
<td colspan="2" style="border: 0px"><hr style="border:1px black solid"></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Tanggal Terima</td>
    <td style="width:400px;border: 0px"> &nbsp;
    <input type="date" name="tanggal_terima" <?php echo $tt;?>><p style="color:red;margin-bottom:0;padding:0;">* FORMAT = MM/DD/YYYY *</p></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Sampai Tanggal</td>
    <td style="width:400px;border: 0px"> &nbsp;
    <input type="date" name="sampai" value="<?php echo $tgl;?>"><p style="color:red;margin-bottom:0;padding:0;">* FORMAT = MM/DD/YYYY *</p></td>
</tr> 
<tr>
    <td style="width:100px;border: 0px">Klasifikasi Surat </td>
    <td style="width:100px;border: 0px">&nbsp; <select name="klasifikasi" style="width:221px;">
        <option value="*">Semua Kode</option>
        <option value="hj">HJ : Haji</option>
        <option value="hk">HK : Hukum</option>
        <option value="hm">HM : Kehumasan</option>
        <option value="kp">KP : Kepegawaian</option>
        <option value="ks">KS : Kesekretariatan</option>
        <option value="ku">KU : Keuangan</option>
        <option value="ot">OT : Organisasi dan Tatalaksana</option>
        <option value="ba">BA : Pembinaan Agama</option>
        <option value="pp">PP : Pendidikan dan Pengajaran</option>
        <option value="tl">TL : Penelitian</option>
        <option value="ps">PS : Pengawasan</option>
        <option value="pw">PW : Perkawinan</option>
        </select></td>
</tr> 
<tr>
    <td style="width:100px;border: 0px">Sifat Surat </td>
    <td style="width:100px;border: 0px">&nbsp; <select name="sifat" style="width:221px;">
        <option value="*">Sifat Surat</option>
        <option value="biasa">Biasa</option>
        <option value="penting">Penting</option>
        <option value="rahasia">Rahasia</option>
        <option value="segera">Segera</option>
        <option value="sangatrahasia">Sangat Rahasia</option>
        </select></td>
</tr> 
<tr>
    <td style="width:100px;border: 0px">Status Surat </td>
    <td style="width:100px;border: 0px">&nbsp; <select name="status_surat" style="width:221px;">
        <option value="*">Status Surat</option>
        <option value="diterima">Sudah Diterima</option>
        <option value="proses">Sedang Di Proses</option>
        <option value="dibalas">Sudah Dibalas</option>
        <option value="diarsipkan">Di Arsipkan</option>
        </select></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Direktorat </td>
    <td style="width:100px;border: 0px">&nbsp; <select name="dir" style="width:221px;">
        <option value="*">Semua Direktorat</option>
        <?php foreach($dir as $d => $d_val){ ?>
        <option value="<?php echo $d_val; ?>"><?php echo $d; ?></option>
        <?php } ?>
        </select></td>
</tr>
<tr>
    <td style="width:100px;border: 0px">Status Deadline Balasan Surat </td>
    <td style="width:100px;border: 0px">&nbsp; <select name="deadline" style="width:221px;">
        <option value="*">Semua Status</option>
        <option value="bdbld">Belum dibalas dan belum lewat deadline</option>
        <option value="bdsld">Belum dibalas dan sudah lewat deadline</option>
        <option value="sd">Sudah dibalas</option>
        </select></td>
</tr>
</table>
        <b> * : harus di isi<br><br>        </b>
       
<input type="submit" value="Submit"> <input type="reset" value="Reset">
    </center>
<br><br>
</form>
<?php if($_POST['cari']!=NULL){ ?>

*klik pada nama file untuk mendownload file*
<table width="100%" border="0">
  <tr bgcolor="#036">
    <th width="3%"><center>No</th>
    <th width="5%"><center>ID Surat</th>
    <th width="20%"><center>No Urut</th>
    <th width="10%"><center>No Surat</th>
    <th width="10%"><center>Tanggal Terima</th>
    <th width="30%"><center>Asal Surat</th>
    <th width="15%"><center>Sifat Surat</th>
    <th width="10%"><center>Perihal</th>
    <th width="10%"><center>Lampiran</th>
    <th width="10%"><center>Pengelola</th>    
    <th width="8%"><center>Lokasi</th>

    <th width="10%"><center>Deadline</th>
    <th width="10%"><center>Nama File</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php
    $kunci = $_POST['cari'];
    $kate = $_POST['pilihan'];
    
    $klasifikasi = $_POST['klasifikasi'];
    $sifat = $_POST['sifat'];
    $status = $_POST['status_surat'];
    $dir = $_POST['dir'];
    $deadline = $_POST['deadline'];
    $tt = $_POST['tanggal_terima'];
    $sampai = $_POST['sampai'];
    

    
    $sql="select * from `tb_surat` where `$kate` = '$kunci' or 'tanggalterima_surat' = '$tt' or 'tanggal_surat' = '$sampai' or 'kasifikasi_surat' = '$klasifikasi' or 'sifat_surat' = '$sifat' or 'status_surat' = '$status' or 'tujuan_surat' = '$dir' order by `id_surat` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 2;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no1 = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
        
		foreach($arr as $d) {
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
            $lokasi = $d['lokasi_surat'];
                $pengelola = $d['pengelola_surat'];
                $deadline = $d['deadline_surat'];
                $file = $d['file_surat'];
                }
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no1</td>
                <td>$id_sm</td>
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
				<td><a href='ypathfile/$file'>$file</a></td>";
echo"   
				<td align='center'>
<a href='?mnu=suratmasuk&pro=ubah&kode=$id_sm'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=suratmasuk&pro=hapus&kode=$id_sm'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_pegawai pada data suratmasuk ?..\")'></a></td>
				</tr>";
			
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

