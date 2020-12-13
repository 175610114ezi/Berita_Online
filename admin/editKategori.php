<?php
	session_start();
	include '../koneksi.php';
	if(!isset($_SESSION['username'])){
		header('location:index.php');
	}
	$id = $_GET['id'];
	$query = mysqli_query($kon, "SELECT * FROM kategori WHERE id_kategori='$id'")or die (mysqli_error($kon));
	$tampil = mysqli_fetch_array($query);
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
	<link href="css/jquery-ui.css" rel="stylesheet">

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
						<h4>Edit Kategori</h4>
						<hr />
						<div class="row-fluid">
							<div class="span8">
							<form action="aksiKategori.php" method="POST">
								<label>Id Kategori</label>
								<input type="text" value="<?php echo $tampil['id_kategori']; ?>" class="input-xxlarge" name="id_kategori" readonly>
								<label>Nama Kategori</label>
								<input type="text" value="<?php echo $tampil['nm_kategori']; ?>" class="input-xxlarge" name="nm_kategori" >
								<br/>
									<td><button type="reset" class="btn btn-warning disabled">Hapus</button></td>
									<td><button type="submit" class="btn btn-primary" name="simpan">Simpan</button></td>	
							</form>
						</div>
						<div class="span4">
							<table class="table table-hover">
								<thead>
									<tr>
										<td colspan="2">Status Kategori</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Date Published : </td>
										<td><?php echo date('d-m-Y'); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
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
    <script src="js/jquery-ui.js"></script>
	<script src="js/bootstrap-dropdown.js"></script>
	<script src="js/bootstrap-collapse.js"></script>
	<script src="js/ckeditor/ckeditor.js"></script>
    <script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    </script>
  </body>
</html>
