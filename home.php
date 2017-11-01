<article><h1>Berita</h1><hr><br>
<?php 
    $sql2="SELECT * FROM `tb_berita` order by id_berita DESC LIMIT 2";
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
				$id_berita=$d["id_berita"];
				$judul=$d['judul'];
                $isi=$d['isi'];
                $pembuat=$d['pembuat'];
                $tanggal=$d['dipost'];
?>


<div class="berita">
    <br>
    <h2><a href="#" alt="#" class="judul"><?php echo $judul; ?></a></h2>
<hr>
<br>
<p class="isi"><?php echo $isi;?></p>
<br>
<hr>
<a href='#' class="disabled" style="color:black;">Dibuat Oleh : <?php echo $pembuat;?> | Tanggal : <?php echo $tanggal;?></a>

    </div>

<br><br>


<?php } ?>
</article>
