<div id=groupmodul>
       <table id=tablemodul>               
       		<tr><th width="150" class="menu">Menu</th></tr>                 

 <?php
if(isset($_SESSION["cid"])){
    echo"<tr><td><a href='index.php?mnu=beranda'>Beranda</a></td></tr>";
	 echo"<tr><td><a href='index.php?mnu=profil'>Profil</a></td></tr>";
	 echo"<tr><td><a href='index.php?mnu=kontak'>Kontak</a></td></tr>";      
} else{ ?>
	<tr><td><?php require_once('login.php'); ?></td></tr> 

	<?php }

      ?>
      
</table></div>
