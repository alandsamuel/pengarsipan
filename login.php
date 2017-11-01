<?php
session_start();
?>

<form name="formLogin" method="post" action="" class="login">
    <br>
<marquee>
      Silakan Tulis Data Login Anda
</marquee><br><br>
Username : <center><input type="text" name="user" id="user" style="width:130px;"/></center><br>
   
Password : <center><input type="password" name="pass" id="pass" style="width:130px;"/></center><br>

<center><input type="submit" name="Login" id="Login" value="Login">   
      <input type="Reset" name="Reset" id="Reset" value="Reset"></center>
      

</form>

<?php
if(isset($_POST["Login"])){
	$usr=$_POST["user"];
	$pas=$_POST["pass"];
	
		$sql1="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		$sql2="select * from `$tbpegawai` where `username_pegawai`='$usr' and `password_pegawai`='$pas' and `status_pegawai`='Aktif'";
		//$sql3="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		
		if(getJum($conn,$sql1)>0){
			$d=getField($conn,$sql1);
                $login='1';
				$kode=$d["kode_admin"];
				$nama=$d["username"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]="Admin";
		echo "<script>alert('Otentikasi ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		} elseif(getJum($conn,$sql2)>0){
			$d=getField($conn,$sql2);
                $login='1';
				$kode=$d["id_pegawai"];
				$nama=$d["username_pegawai"];
                $bag=$d["bagian_pegawai"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]="User";
                   $_SESSION["bagian"]=$bag;
		echo "<script>alert('Otentikasi ".$_SESSION["cnama"]." (".$_SESSION["cid"]."), dari bagian ".$_SESSION["cstatus"]." berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		} else{
			session_destroy();
			echo "<script>alert('Otentikasi Login GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='index.php?mnu=login';</script>";
        }
}


?>