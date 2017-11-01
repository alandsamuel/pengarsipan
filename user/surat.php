<?php
$pro="simpan";
$tanggalterima_sm=WKT(date("Y-m-d"));
$tanggalsurat_sm=WKT(date("Y-m-d"));

$gambar0="avatar.jpg";
$status="Aktif";
$bag = $_SESSION['bagian'];
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
win=window.open('user/sm/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, tanggalsurat_sm=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


<?php
if($_GET["pro"]=="ubah"){
	$id_sm=$_GET["kode"];
	$sql="select * from `$tbsuratmasuk` where `id_sm`='$id_sm'";
	$d=getField($conn,$sql);
				$id_sm=$d["id_sm"];
				$id_sm0=$d["id_sm"];
				$id_pegawai=$d["id_pegawai"];
				$tanggalkeluar_sm=WKT($d["tanggalkeluar_sm"]);
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
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$pro="ubah";		
}
?>

Data suratmasuk: 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
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
    <th width="8%"><center>Lokasi </th>
    <th width="8%"><center>Deadline</th>
    <th width="8%"><center>Nama File</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php 
    $tipe = 'sm';
  $sql="select * from `$tbsurat` where tipe_surat = '$tipe' and tujuan_surat = '$bag' and konfirmasi = '1' ";
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
				<td><a href='ypathfile/$file'>$file</a></td>";
echo"
				<td align='center'>
<a href='?mnu=surat&pro=hapus&kode=$id_sm'><img src='ypathicon/h.png' alt='hapus' 
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=surat'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=surat'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=surat'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

<?php
if($_GET["pro"]=="hapus"){
$id_sm=$_GET["kode"];
$sql="delete from `$tbsurat` where `id_surat`='$id_sm'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data suratmasuk $id_sm berhasil dihapus !');document.location.href='?mnu=surat';</script>";}
else{echo"<script>alert('Data suratmasuk $id_sm gagal dihapus...');document.location.href='?mnu=surat';</script>";}
}
?>