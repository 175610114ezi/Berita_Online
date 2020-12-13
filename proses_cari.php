<!DOCTYPE html>
<html>
<head>
<title>Berita Pencarian</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Express News Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			pager: true,
		  });
		});
	</script>
	<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
</head>
<body>
	<!-- header-section-starts-here -->
	<div class="header">
		<div class="header-bottom">
			<div class="navigation">
				<nav class="navbar navbar-default" role="navigation">
		   <div class="wrap">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
			<!--/.navbar-header-->
		
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php?menu=home">Beranda</a></li>
					<li><a href="index.php?menu=ekonomi">Ekonomi</a></li>
				    <li><a href="index.php?menu=politik">Politik</a></li>
				    <li><a href="index.php?menu=olahraga">Olahraga</a></li>
					<li><a href="index.php?menu=teknologi">Teknologi</a></li>
					<li><a href="index.php?menu=internasional">Internasional</a></li>
					<div class="clearfix"></div>
				</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<!--/.navbar-collapse-->
	 <!--/.navbar-->
			</div>
		</nav>
		</div>
	</div>
	<!-- header-section-ends-here -->
	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
			 <div class="secound_half">
			 <div class="tags">
			 <?php
					include 'koneksi.php';
					
					$search = $_POST['search'];
					$query = "SELECT * FROM isi_berita WHERE judul like '%$search' OR isi like '%$search%' ORDER BY tanggal LIMIT 6";
					$query = mysqli_query($kon, $query)or die(mysqli_error($kon));
					
			?>
			<header>
				<h3 class="title-head"><?php echo "Pencarian : $search <br/>"; ?></h3>
			</header>
				<?php
					if(mysqli_num_rows($query)==0){
						?>
							<script type="text/javascript">
								alert("Data Tidak Ditemukan");
								window.location.href="index.php?menu=home";
							</script>
						<?php
					}elseif($search==""){
						?>
							<script type="text/javascript">
								alert("Silahkan Input Terlebih Dahulu");
								window.location.href="index.php?menu=home";
							</script>
						<?php
					}else{
				?>
				<p>
				<?php
					
					while($tampil = mysqli_fetch_array($query)){
						echo "<b>$tampil[judul]"."</b><br/>";
						echo "&nbsp;&nbsp;$tampil[tanggal]<img src='$tampil[gambar]' align='left' width='100px' height='100px'><br/>";
						$data = substr($tampil['isi'],0,100)."<br/>";
						echo "&nbsp;&nbsp;$data"."<br/>";
						echo "<a href='detail_berita.php?id=$tampil[id_berita]' target='blank'>&nbsp;&nbsp;<img src='images/more.png'/></a>"."<br/>";
					}
				}
				?>
				</p>
			 </div>					 
			 <div class="popular-news">
				<header>
					<h3 class="title-popular"></h3>
				</header>
				
			</div>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>		
		</div>
		</div>
	<!-- content-section-ends-here -->
	<!-- footer-section-starts-here -->
	<div class="footer">
		<div class="footer-top">
			<div class="wrap">
				<div class="col-md-3 col-xs-6 col-sm-4 footer-grid">
					<h4 class="footer-head">About Us</h4>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here.</p>
				</div>
				<div class="col-md-2 col-xs-6 col-sm-2 footer-grid">
					<h4 class="footer-head">Kategori</h4>
					<ul class="cat">
						<li><a href="index.php?menu=ekonomi">Ekonomi</a></li>
						<li><a href="index.php?menu=politik">Politik</a></li>
						<li><a href="index.php?menu=olahraga">Olahraga</a></li>
						<li><a href="index.php?menu=teknologi">Teknologi</a></li>
						<li><a href="index.php?menu=internasional">Internasional</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-xs-6 col-sm-6 footer-grid">
					<h4 class="footer-head">Flickr Feed</h4>
					<ul class="flickr">
						<li><a href="#"><img src="images/bus4.jpg"></a></li>
						<li><a href="#"><img src="images/bus2.jpg"></a></li>
						<li><a href="#"><img src="images/bus3.jpg"></a></li>
						<li><a href="#"><img src="images/tec4.jpg"></a></li>
						<li><a href="#"><img src="images/tec2.jpg"></a></li>
						<li><a href="#"><img src="images/tec3.jpg"></a></li>
						<li><a href="#"><img src="images/bus2.jpg"></a></li>
						<li><a href="#"><img src="images/bus3.jpg"></a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="col-md-3 col-xs-12 footer-grid">
					<h4 class="footer-head">Hubungi Kami</h4>
					<address>
						<ul class="location">
							<li><span class="glyphicon glyphicon-map-marker"></span></li>
							<li>Pusat Bantuan Jln. Janti Gg. Puntodewo No. 143 A</li>
							<div class="clearfix"></div>
						</ul>	
						<ul class="location">
							<li><span class="glyphicon glyphicon-earphone"></span></li>
							<li>087712346329</li>
							<div class="clearfix"></div>
						</ul>	
						<ul class="location">
							<li><span class="glyphicon glyphicon-envelope"></span></li>
							<li><a href="mailto:info@example.com"> ezimiste@gmail.com</a></li>
							<div class="clearfix"></div>
						</ul>						
					</address>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="wrap">
				<div class="copyrights col-md-6">
					<p> © 2020 Portal Berita Online </p>
				</div>
				<div class="footer-social-icons col-md-6">
					<ul>
						<li><a target="blank" href="https://web.facebook.com"></a></li>
						<li><a target="blank" class="twitter" href="https://twitter.com/"></a></li>
						<li><a target="blank" class="flickr" href="https://www.flickr.com/"></a></li>
						<li><a target="blank" class="googleplus" href="https://plus.google.com"></a></li>
						<li><a target="blank" class="dribbble" href="https://dribbble.com"></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- footer-section-ends-here -->
	<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->
</body>
</html>