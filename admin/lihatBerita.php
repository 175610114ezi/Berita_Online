<?php
	session_start();
	include '../koneksi.php';
	if(!isset($_SESSION['username'])){
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin || Portal Berita Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="apple-mobile-web-app-capable" content="yes" >
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/admin.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
  </head>

  <body>
	<div class="navbar navbar-fixed-top navbar-inverse">
		<div class="navbar-inner">
		    <a class="brand" href="home.php" style="margin-left:10px;">Home</a>
		    <ul class="nav">
		      <li class="active"><a href="../index.php" target="blank" ><span class="icon-globe icon-white"></span> Lihat Situs &raquo;</a></li>
		    </ul>
				<ul class="nav pull-right">
				  <li class="divider-vertical"></li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/imagesite/user.png" style="width:20px;height:20px;margin-right:10px"/>Hai, Admin<b class="caret"></b></a>
					<ul class="dropdown-menu">
					  <li class="divider"></li>
					  <li><a href="logout.php">Logout</a></li>
					</ul>
				  </li>
                </ul>
		  </div>
	</div>

	<div class="container-fluid contenadmin">
		<div class="row-fluid">
			<div class="span3">
			<div class="konten">
				<div class="accordion" id="accordion2">
						<div class="accordion-group">
						  <div class="accordion-heading">
						    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
						      <span class="icon-edit"></span> Posting <span class="icon-chevron-down pull-right"></span>
						    </a>
						  </div>
						  <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">
						    <div class="accordion-inner">
							<ul class="nav nav-pills nav-stacked">
							 <li><a href="lihatBerita.php">Berita</a></li>
							 <li><a href="kategori.php">Kategori</a></li>
							</ul>
						    </div>
						  </div>
						</div>
					 </div>
					 
					  <div class="accordion-group">
						  <div class="accordion-heading">
						    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwelve">
						      <span class="icon-book"></span> Tambah <span class="icon-chevron-down pull-right"></span>
						    </a>
						  </div>
						  <div id="collapseTwelve" class="accordion-body collapse" style="height: 0px; ">
						    <div class="accordion-inner">
							<ul class="nav nav-pills nav-stacked">
							 <li><a href="inputBerita.php">Berita</a></li>
							 <li><a href="inputKategori.php">Kategori</a></li>
							</ul>
						    </div>
						  </div>
					 </div>
					<hr />
				</div>
			</div>
			<div class="span9">
				<div class="konten">
						<h3>Data Berita</h3>
						<hr />

						<div class="row-fluid">
							<div class="span12">
								<table class="table table-hover">
									<thead style="font-weight:bold;color: #1C8D25;background: #E4E4E4;">
										<tr>
											<th>Id Berita</th>
											<th>Judul</th>
											<th>Tanggal</th>
											<th>Foto</th>
											<th colspan="2">Aksi</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$perHalaman = 4;//Batas Halaman Artikel yang ditampilkan sebanyak 3 buah
										$hal_berita    = isset($_GET['halaman']) ? $_GET['halaman'] :1;
										$mulai  = ($hal_berita > 1) ? ($hal_berita * $perHalaman) - $perHalaman :0;

										$artikel= mysqli_query($kon, "SELECT * FROM isi_berita ORDER BY tanggal DESC LIMIT $mulai, $perHalaman");

										$sql = mysqli_query($kon, "SELECT * FROM isi_berita");//query untuk menghitung total jumlah keseluruhan tabel 
										$total  = mysqli_num_rows($sql);
										//die("total..".$total);
										$semua_hal  = ceil($total/$perHalaman);

										while ($tampil = mysqli_fetch_assoc($artikel)) {
									?>
										<tr>
											<td><?php echo $tampil['id_berita']; ?></td>
											<td width="550px"><?php echo $tampil['judul']; ?></td>
											<td><?php echo $tampil['tanggal']; ?></td>
											<td><img src="../<?php echo $tampil['gambar']; ?>" width="100" height="100"></td>
											<td colspan="2">
												<a href="editBerita.php?id=<?php echo $tampil['id_berita']; ?>"><span class="label label-warning">Edit</span></a> ||
												<a onclick="return confirm('Anda Yakin Ingin Menghapus Data INI')" href="hapusBerita.php?id=<?php echo $tampil['id_berita']; ?>"><span class="label label-important">Hapus</span></a>
											</td>
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
								<div align="center">
									<?php for($i=1; $i<=$semua_hal; $i++){?>
										<a href="lihatBerita.php?halaman=<?php echo $i ?>"> <?php echo $i; ?></a>
									<?php }?>
								</div>
							</div>
						</div>
						<hr/>
				</div>
			</div>
		</div>
	</div>
	
	<footer align="center">
		<h5>&copy; Portal Berita Online 2019</h5>
	</footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    	<script src="js/jquery.js"></script>
	<script src="js/bootstrap-dropdown.js"></script>
	<script src="js/bootstrap-collapse.js"></script>

  </body>
</html>
