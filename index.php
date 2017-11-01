<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

$h = date('w');

switch ($h) {
    case '1' :
        $hari = 'Senin';
        break;
    case '2' :
        $hari = 'Selasa';
        break;
    case '3' :
        $hari = 'Rabu';
        break;
    case '4' :
        $hari = 'Kamis';
        break;
    case '5' :
        $hari = 'Jumat';
        break;
    case '6' :
        $hari = 'Sabtu';
        break;
    
    default:
        $hari = 'Minggu';
}

$tgl = date('d-m-Y');
$login = '0';
?>



<title>Sistem Pengelolaan Administrasi Arsip Direktorat Jenderal Pendidikan Islam Kementrian Agama RI</title>
<!-- Favicon -->
	<link rel="shortcut icon" href="./img/kemenaglogo.png">

<link rel="stylesheet" href="css/style.css" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
<link rel="stylesheet" href="css/bs/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="css/animate.css">

<script src="js/jquery-1.4.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/hoverIntent.js" type="text/javascript"></script>
        <script src="ypathcss/wow.min.js"></script>
              <script>
              new WOW().init();
        </script>
	<script type="text/javascript">
      $(document).ready(function(){
			   $('ul.nav').superfish();
		  });
  </script>
<style type="text/css">
</style>
<body>
<!--<div id="tabel"><img src="img/headers.jpg"></div> -->
<div id="tabelsystem" style="margin-top:1%;" class="wow fadeIn">
<div id="top">
    <ul class="nav">
<?php echo"<li    data-wow-delay='2s'><a style='color:white;'>".$hari.", ".$tgl."</a></li>"; ?>
</ul>
    </div>
    </div>

    <div class="wow fadeIn" data-wow-delay="0.5s" style="background-color:#fff; margin: auto 1%;"><center><br><img src="img/header.png" class="resp"/></center><br></div> 
    
<div id="tabelsystem" class="wow fadeIn" data-wow-delay="1s">
<div id="top">
<ul class="nav">            
<?php
if($_SESSION["cstatus"]=='Admin'){	
      echo"
	  <li   data-wow-delay='2s'><a href='index.php?mnu=beranda'>Beranda</a></li>
      <li   data-wow-delay='2.11s'><a href='index.php?mnu=admin'>Admin</a></li>      
	  <li   data-wow-delay='2.2s'><a href='index.php?mnu=pegawai'>Pegawai</a></li>
      <li   data-wow-delay='2.3s'><a href='index.php?mnu=berita'>Tambah Berita</a></li>
	  <li   data-wow-delay='2.4s'><a href='index.php?mnu=suratmasuk'>Surat Masuk</a></li>
	  <li   data-wow-delay='2.5s'><a href='index.php?mnu=suratkeluar'>Surat Keluar</a></li>
	  <li   data-wow-delay='2.6s'><a href='index.php?mnu=admcari'>Cari Surat </a></li>
      <li   data-wow-delay='2.7s'><a href='index.php?mnu=logout'>Keluar</a></li>";
}elseif($_SESSION["cid"]==NULL) {
    echo"<li></li>";
     
}else {
    echo"<li   data-wow-delay='2s'><a href='index.php?mnu=beranda'>Beranda</a></li>";
    echo"<li   data-wow-delay='2.1s'><a href='index.php?mnu=konfirmasi'>Konfirmasi Surat Masuk</a></li>";
    echo"<li   data-wow-delay='2.2s'><a href='index.php?mnu=surat'>Surat Masuk</a></li>";
    echo"<li   data-wow-delay='2.3s'><a href='index.php?mnu=status'>Surat Keluar</a></li>";
    echo"<li   data-wow-delay='2.4s'><a href='index.php?mnu=cari'>Cari Surat</a></li>";
    echo"<li   data-wow-delay='2.5s'><a href='index.php?mnu=logout'>Keluar</a></li>";
}
      ?>
<li class="sep"></li>
<li class="right"></li>
</ul>			
    </div></div>
<?php if(isset($_SESSION["cid"])){
include "kiri.php";
} else { include "kiri.php";} ?>
<?php 
echo"<div id=groupmodul1>
      <table id=tablemodul  class='min-size'>               
       <tr><th width='1500' class='menu'><strong>MENU ".strtoupper($mnu)."</strong></th></tr>"; 
       echo "<tr><td>";
				//-=====================
				
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="pegawai"){require_once"pegawai/pegawai.php";}
else if($mnu=="suratmasuk"){require_once"suratmasuk/suratmasuk.php";}
else if($mnu=="suratkeluar"){require_once"suratkeluar/suratkeluar.php";}
else if($mnu=="surat"){require_once"user/surat.php";}
else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}
else if($mnu=="konfirmasi"){require_once"user/konfirmasi.php";}
else if($mnu=="cari"){require_once"user/cari.php";}
else if($mnu=="admcari"){require_once"admin/cari.php";}
else if($mnu=="status"){require_once"user/status.php";}
else if($mnu=="berita"){require_once"admin/berita.php";}
else if($mnu=="profil"){require_once"profil.php";}
else if($mnu=="kontak"){require_once"kontak.php";}

else {require_once"home.php";}
				
				//-=====================
				echo"</td></tr></table>
";
 ?>
    </div>
<div id=footer><center><?php echo $footer;?></div>


<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Januari"){$bul="01";}
	else if($arr[1]=="Februari"){$bul="02";}
	else if($arr[1]=="Maret"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Juni"){$bul="06";}
	else if($arr[1]=="Juli"){$bul="07";}
	else if($arr[1]=="Agustus"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
?>

