<?php
$pro="simpan";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pegawai/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status_pegawai=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_pegawai` from `$tbpegawai` order by `id_pegawai` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PEG".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_pegawai"];
   
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
  $id_pegawai=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_pegawai=$_GET["kode"];
	$sql="select * from `$tbpegawai` where `id_pegawai`='$id_pegawai'";
	$d=getField($conn,$sql);
				$id_pegawai=$d["id_pegawai"];
				$id_pegawai0=$d["id_pegawai"];
				$nama_pegawai=$d["nama_pegawai"];
				$bagian_pegawai=$d["bagian_pegawai"];
				$email_pegawai=$d["email_pegawai"];
				$username_pegawai=$d["username_pegawai"];
				$password_pegawai=$d["password_pegawai"];
				$status_pegawai=$d["status_pegawai"];
				$pro="ubah";		
}
?>


<form action="" method="post" enctype="multipart/form-data" class='wow bounceInLeft' data-wow-delay="2.5s">
<table width="636">


<tr>
<th width="209"><label for="id_pegawai">id_pegawai</label>
<th width="10">:
<th width="402" colspan="2"><b><?php echo $id_pegawai;?></b>
</tr>

<tr>
<td><label for="nama_pegawai">Nama Pegawai</label>
<td>:
<td colspan="2"><input name="nama_pegawai" type="text" id="nama_pegawai" value="<?php echo $nama_pegawai;?>" size="30" /></td>
</tr>

<tr>
<td height="24"><label for="bagian_pegawai">Bagian Pegawai</label>
<td>:<td colspan="2">
    <select name="bagian_pegawai" style="width:243px;">
    <?php
    
        foreach($png as $r => $r_val){
            if($bagian_pegawai != NULL){
            if($r['nama_bagian']= $bagian_pegawai){
            echo '<option value="'.$r_val.'" SELECTED>'.$r.'</option>';  
            } else {
            echo '<option value="'.$r_val.'" >'.$r.'</option>';  
            } 
            } else {
               echo '<option value="'.$r_val.'" >'.$r.'</option>';  
            }
        }
        
    ?>
    </select>
</td>
</tr>

<tr>
<td height="24"><label for="email_pegawai">Email Pegawai</label>
<td>:
<td><input name="email_pegawai" type="text" id="email_pegawai" value="<?php echo $email_pegawai;?>" size="30" />
 </td>
</tr>

<tr>
<td height="24"><label for="username_pegawai">Username</label>
<td>:<td colspan="2"><input name="username_pegawai" type="text" id="username_pegawai" value="<?php echo $username_pegawai;?>" size="25" />
</td>
</tr>

<tr>
<td height="24">Password
<td>:<td colspan="2"><input name="password_pegawai" type="password" id="password_pegawai" value="<?php echo $password_pegawai;?>" size="25" />
</td>
</tr>

<tr>
<td><label for="status_pegawai">status_pegawai</label>
<td>:<td colspan="2">
<input type="radio" name="status_pegawai" id="status_pegawai"  checked="checked" value="Aktif" <?php if($status_pegawai=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status_pegawai" id="status_pegawai" value="Tidak Aktif" <?php if($status_pegawai=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_pegawai" type="hidden" id="id_pegawai" value="<?php echo $id_pegawai;?>" />
        <input name="id_pegawai0" type="hidden" id="id_pegawai0" value="<?php echo $id_pegawai0;?>" />
        <a href="?mnu=pegawai"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

Data pegawai: 
| <a href="pegawai/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="pegawai/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="pegawai/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#036">
    <th width="3%"><center>no</th>
    <th width="10%"><center>id_pegawai</th>
    <th width="20%"><center>nama_pegawai</th>
    <th width="10%"><center>bagian_pegawai</th>
    <th width="30%"><center>email_pegawai</th>
    <th width="15%"><center>username_pegawai</th>
    <th width="15%"><center>password_pegawai</th>
    <th width="10%"><center>status_pegawai</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbpegawai` order by `id_pegawai` desc";
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
            
    $delay = 2.5;					
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_pegawai=$d["id_pegawai"];
				$nama_pegawai=$d["nama_pegawai"];
				$bagian_pegawai=$d["bagian_pegawai"];
				$email_pegawai=$d["email_pegawai"];
				$username_pegawai=$d["username_pegawai"];
				$password_pegawai=$d["password_pegawai"];
				$status_pegawai=$d["status_pegawai"];
					$color="#dddddd";
                    	
            $delay = $delay+0.5;
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td  class='wow fadeIn' data-wow-delay='$delay'>$no</td>
				<td  class='wow fadeIn' data-wow-delay='$delay'>$id_pegawai</td>
				<td  class='wow fadeIn' data-wow-delay='$delay'>$nama_pegawai</td>
				<td  class='wow fadeIn' data-wow-delay='$delay'>$bagian_pegawai</td>
				<td  class='wow fadeIn' data-wow-delay='$delay'>$email_pegawai</td>
				<td  class='wow fadeIn' data-wow-delay='$delay'>$username_pegawai</td>
				<td  class='wow fadeIn' data-wow-delay='$delay'>$password_pegawai</td>
				<td  class='wow fadeIn' data-wow-delay='$delay'>$status_pegawai</td>
				<td align='center'  class='wow fadeIn' data-wow-delay='$delay'>
<a href='?mnu=pegawai&pro=ubah&kode=$id_pegawai'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pegawai&pro=hapus&kode=$id_pegawai'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_pegawai pada data pegawai ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pegawai belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pegawai'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pegawai'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pegawai'>Next »</a></span>";
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
	$id_pegawai=strip_tags($_POST["id_pegawai"]);
	$id_pegawai0=strip_tags($_POST["id_pegawai0"]);
	$nama_pegawai=strip_tags($_POST["nama_pegawai"]);
	$bagian_pegawai=strip_tags($_POST["bagian_pegawai"]);
	$email_pegawai=strip_tags($_POST["email_pegawai"]);
	$username_pegawai=strip_tags($_POST["username_pegawai"]);
	$password_pegawai=strip_tags($_POST["password_pegawai"]);
	$status_pegawai=strip_tags($_POST["status_pegawai"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpegawai` (
`id_pegawai` ,
`nama_pegawai` ,
`bagian_pegawai` ,
`email_pegawai` ,
`username_pegawai` ,
`password_pegawai` ,
`status_pegawai` 
) VALUES (
'$id_pegawai', 
'$nama_pegawai', 
'$bagian_pegawai',
'$email_pegawai',
'$username_pegawai',
'$password_pegawai',
'$status_pegawai'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_pegawai berhasil disimpan !');document.location.href='?mnu=pegawai';</script>";}
		else{echo"<script>alert('Data $id_pegawai gagal disimpan...');document.location.href='?mnu=pegawai';</script>";}
	}
	else{
$sql="update `$tbpegawai` set 
`nama_pegawai`='$nama_pegawai',
`bagian_pegawai`='$bagian_pegawai' ,
`email_pegawai`='$email_pegawai',
`status_pegawai`='$password_pegawai',
`username_pegawai`='$username_pegawai' ,
`password_pegawai`='$password_pegawai' 
where `id_pegawai`='$id_pegawai0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_pegawai berhasil diubah !');document.location.href='?mnu=pegawai';</script>";}
	else{echo"<script>alert('Data $id_pegawai gagal diubah...');document.location.href='?mnu=pegawai';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_pegawai=$_GET["kode"];
$sql="delete from `$tbpegawai` where `id_pegawai`='$id_pegawai'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data pegawai $id_pegawai berhasil dihapus !');document.location.href='?mnu=pegawai';</script>";}
else{echo"<script>alert('Data pegawai $kode_pegawai gagal dihapus...');document.location.href='?mnu=pegawai';</script>";}
}
?>

