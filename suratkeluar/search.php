<?php
    /*
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'root', '' , 'pengarsipan');

	$sql = $conn->prepare("SELECT id_pegawai FROM tb_pegawai WHERE id_pegawai LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$id_pegawai[] = $row["id_pegawai"];
		}
		echo json_encode($countryResult);
	}
	$conn->close();
    */
?>

<?php 
$con=mysqli_connect("localhost","root","","pengarsipan");

 $sql = "SELECT id_pegawai FROM tb_pegawai
   WHERE id_pegawai LIKE '%".$_GET['query']."%'
   LIMIT 10"; 
 $result    = mysqli_query($con,$sql);
  
 $json = [];
 while($row = $result->fetch_assoc()){
      $json[] = $row['id_pegawai'];
 }

 echo json_encode($json);
?>