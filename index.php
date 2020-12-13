<?php
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Portal Berita Online</title>
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
				    <li><a href="index.php?menu=olahraga">Olaharaga</a></li>
					<li><a href="index.php?menu=teknologi">Teknologi</a></li>
					<li><a href="index.php?menu=internasional">Internasional</a></li>
					<div class="clearfix"></div>
				</ul>
				<div class="search">
					<!-- start search-->
				    <div class="search-box">
					    <div id="sb-search" class="sb-search">
							<form action="proses_cari.php" method="POST">
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
				    </div>
					<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->
					</div>
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
	<div class="wrap">
		<div class="move-text">
			<div class="breaking_news">
				<h2>Breaking News</h2>
			</div>
			<div class="marquee">
				<?php
					$tampil = mysqli_query($kon, "SELECT * FROM isi_berita ORDER BY tanggal DESC LIMIT 3");
						while ($hal_berita = mysqli_fetch_assoc($tampil)) {
							echo "$hal_berita[judul]"."&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;";
						}
				?>
			</div>
			<div class="clearfix"></div>
			<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
			<script>
			  $('.marquee').marquee({ pauseOnHover: true });
			  //@ sourceURL=pen.js
			</script>
		</div>
	</div>
	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
			<div class="col-md-8 content-left">
				<div class="slider">
					<div class="callbacks_wrap">
						<ul class="rslides" id="slider">
								<?php
									$tampil = mysqli_query($kon, "SELECT * FROM isi_berita ORDER BY tanggal DESC LIMIT 3");
									while ($hal_berita = mysqli_fetch_assoc($tampil)) {
								?>
							<li>
								<?php echo "<img src='$hal_berita[gambar]'>"; ?>
								<div class="caption">
									<a href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>"><?php echo $hal_berita['judul']; ?></a>
								</div>
								<?php
									}
								?>
							</li>
						</ul>
					</div>
				</div>
				<div class="articles">	
						<?php
								if(isset($_GET['menu'])){
									$menu = $_GET['menu'];
									if ($menu=='home') 
									{include 'home.php';} //pemanggilan file untuk menu home
									if ($menu=='politik')
										{include 'politik.php';} //pemanggilan file untuk menu politik
									if ($menu=='ekonomi') 
									{include 'ekonomi.php';}
									if ($menu=='teknologi')
										{include 'teknologi.php';}
									if ($menu=='olahraga') 
									{include 'olahraga.php';}
									if ($menu=='internasional') 
										{include 'internasional.php';}
								}else{
									include 'home.php';
								}
							?>
					</div>
				</div>
			<div class="col-md-4 side-bar">
					<div class="first_half">
		         	 	<section class="accordation_menu">
						   <input id="label-1" name="lida" type="radio" checked/>
						   <label for="label-1" id="item1"><i class="ferme"> </i>Populer posting <i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
						    <div class="content" id="a1">
						    	<div class="scrollbar" id="style-2">
								 <div class="force-overflow">
									<div class="popular-post-grids">
										<div class="popular-post-grid">
												<?php
													$tampil = mysqli_query($kon, "SELECT * FROM isi_berita ORDER BY RAND() LIMIT 4");
													while ($hal_berita = mysqli_fetch_assoc($tampil)){
												?>
											<div class="post-img">
												<a href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>"><?php echo "<img src='$hal_berita[gambar]' align='left' width='100px' height='100px'>"; ?></a>
											</div>
											<div class="post-text">
												<a class="pp-title" href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>"> <?php echo $hal_berita['judul']; ?></a>
												<p><strong>
													<?php echo $hal_berita['tanggal']; ?>
												   </strong>
												</p>
											</div>
											<div class="clearfix"></div><br/>
												<?php
													}
												?>
										</div>
									</div>
									</div>
                                </div>
                              </div>
						  <div>
						    <input id="label-2" name="lida" type="radio"/>
						    <label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>Postingan Terbaru<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
						    <div class="content" id="a2">
						       <div class="scrollbar" id="style-2">
								   <div class="force-overflow">
									<div class="popular-post-grids">
											<div class="popular-post-grid">
												<?php
													$tampil = mysqli_query($kon, "SELECT * FROM isi_berita ORDER BY tanggal DESC LIMIT 3");
													while ($hal_berita = mysqli_fetch_assoc($tampil)){
												?>
												<div class="post-img">
													<a href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>"><?php echo "<img src='$hal_berita[gambar]' align='left' width='100px' height='100px'>"; ?>
												</div>
												<div class="post-text">
													<a class="pp-title" href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>"><?php echo $hal_berita['judul']; ?></a>
													<p>
														<?php echo $hal_berita['tanggal']; ?>
													</p>
												</div>
												<div class="clearfix"></div><br/>
												<?php
													}
												?>
											</div>
										</div>
									</div>
								</div>
						    </div>
						  </div>
						</section>
					 </div>
					 <div class="secound_half">			 
					 <div class="popular-news">
						<header>
							<h3 class="title-popular">Berita Populer</h3>
						</header>
						<div class="popular-grids">
							<?php
							$tampil = mysqli_query($kon, "SELECT * FROM isi_berita ORDER BY tanggal DESC LIMIT 4");
							while ($hal_berita = mysqli_fetch_assoc($tampil)){
						?>
						<div class="side-bar-article">
							<a href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>"><?php echo "<img src='$hal_berita[gambar]'>"; ?></a>
							<div class="side-bar-article-title">
								<a href="detail_berita.php?id=<?php echo $hal_berita['id_berita']; ?>"><?php echo $hal_berita['judul']; ?></a>
							</div>
						</div>
						<?php
							}
						?>
					
						</div>
					</div>
					</div>
					<div class="clearfix"></div>
					
				</div>
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
					<h4 class="footer-head">Tentang Kami</h4>
					<p>Portal Berita Online ini dibuat untuk memudahkan anda dalam mencari seputar informasi tentang peristiwa yang sudah dan yang sedang terjadi.</p>
				</div>
				<div class="col-md-2 col-xs-6 col-sm-2 footer-grid">
					<h4 class="footer-head">Kategori</h4>
					<ul class="cat">
						<li><a href="index.php?menu=ekonomi">Ekonomi</a></li>
						<li><a href="index.php?menu=politik">Politik</a></li>
						<li><a href="index.php?menu=olahraga">olah</a></li>
						<li><a href="index.php?menu=teknologi">Teknologi</a></li>
						<li><a href="index.php?menu=internasional">Internasional</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-xs-6 col-sm-6 footer-grid">
					<h4 class="footer-head">Flickr Feed</h4>
					<ul class="flickr">
						<li><a href="#"><img src="gambar/rossi.jpg"></a></li>
						<li><a href="#"><img src="gambar/rusia.jpg"></a></li>
						<li><a href="#"><img src="gambar/messi.jpeg"></a></li>
						<li><a href="#"><img src="gambar/marquez.jpg"></a></li>
						<li><a href="#"><img src="gambar/jokowilanjutkan.jpg"></a></li>
						<li><a href="#"><img src="gambar/dpr.jpg"></a></li>
						<li><a href="#"><img src="gambar/jokowi.jpg"></a></li>
						<li><a href="#"><img src="gambar/pppvspdip.jpg"></a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="col-md-3 col-xs-12 footer-grid">
					<h4 class="footer-head">Hubungi</h4>
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
							<li><a href="mailto:info@example.com">ezimister@gmail.com</a></li>
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
					<p> ©  Portal Berita Online 2020</p>
				</div>
				<div class="footer-social-icons col-md-6">
					<ul>
						<li><a target="blank" class="facebook" href="https://web.facebook.com"></a></li>
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
				wrapID: 'toTop', // fading element id
				wrapHoverID: 'toTopHover', // fading element hover id
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