<?php  
// setting koneksi ke database
//$dbcon=mysql_connect("localhost","id2746074_adhhyyy31","adhy23431");  
//mysql_select_db($dbcon,"id2746074_kebudayaan");

 //$con=mysqli_connect("localhost","id2746074_adhhyyy31","adhy23431","id2746074_kebudayaan");
//Check connection
//if (!$con)
  /* {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } //else { //echo " sukses";} */
$hostmysql = "localhost";
$username = "id2746074_adhhyyy31";
$password = "adhy23431";
$database = "id2746074_kebudayaan";

$conn = mysql_connect("$hostmysql","$username","$password");
if (!$conn) die ("Gagal Melakukan Koneksi");
mysql_select_db($database,$conn) or die ("Database Tidak Diketemukan di Server"); 
  
?>