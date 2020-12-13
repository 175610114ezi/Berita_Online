<div class="articles">	
	<?php
		$perHalaman = 3;//Batas Halaman Artikel yang ditampilkan sebanyak 3 buah
		$hal_berita= isset($_GET['halaman']) ? $_GET['halaman'] :1;
		//die("TesHal..".$hal_berita);
		$mulai  = ($hal_berita > 1) ? ($hal_berita * $perHalaman) - $perHalaman :0;

		$mulai  = ($hal_berita > 1) ? ($hal_berita * $perHalaman) - $perHalaman :0;
	    $artikel= mysqli_query($kon, "SELECT * FROM isi_berita WHERE id_kategori=5 ORDER BY tanggal DESC LIMIT $mulai, $perHalaman");

	    $tampil = mysqli_query($kon, "SELECT * FROM isi_berita WHERE id_kategori=5");//query untuk menghitung total jumlah keseluruhan tabel
		$total  = mysqli_num_rows($tampil);
		//die("total..".$total);
		$semua_hal  = ceil($total/$perHalaman);
	?>
	<?php while ($hal_berita = mysqli_fetch_assoc($artikel)) { ?>
		<div class="article-left">
			<a href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>"><?php echo "<img src='$hal_berita[gambar]'>"; ?></a>
		</div>
		<div class="article-right">
			<div class="article-title">
				<p>Dipublikasikan Tanggal : <?php echo $hal_berita['tanggal']; ?></p>
				<a class="title" href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>" align="justify" style="font-size:20px;"> 
				<?php echo $hal_berita['judul']; ?>
				</a>
			</div>
			<div class="article-text">
				<p align="justify">
					<?php echo substr($hal_berita['isi'],0,200); ?>....
				</p>
				<a href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>"><img src="images/more.png" alt="" />
				</a>
			</div>
		</div>
	<div class="clearfix"></div><br/>
	<?php
		}
	?>
	<div align="center">
		<?php for($i=1; $i<=$semua_hal; $i++){?>
			<a href="index.php?menu=internasional&halaman=<?php echo $i ?>"> <?php echo $i; ?></a>
		<?php }?>
	</div>
</div>
