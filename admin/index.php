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
	<link href="css/login.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
  </head>

  <body>

	<div class="navbar navbar-fixed-top navbar-inverse">
	      <div class="navbar-inner navlogin">
		<div class="container">
		  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		  </a>
		<a class="brand" href="#">Admin Web</a>
		  <div class="nav-collapse">
                    <ul class="nav">
			<li class="divider"></li>
                      <li><h5><?php echo date('d-m-Y');?></h5></li>
                    </ul>
                    <ul class="nav pull-right">
                      <li><a href="../index.php" target="blank">&laquo;Kembali ke Situs</a></li>
                      <li class="divider-vertical"></li>
                    </ul>
                  </div>
		</div>
	      </div>
	    </div>	

	<div class="container isi">
		<div class="row">
			<div class="span6">
				<form class="form-horizontal" action="proses_login.php" method="POST">
					<legend>Login Admin</legend>
					  <div class="control-group">
					    <label class="control-label">Username</label>
					    <div class="controls">
					      <input type="text" name="username" placeholder="Username">
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Password</label>
					    <div class="controls">
					      <input type="password" name="password" placeholder="Password">
					    </div>
					  </div>
					  <div class="control-group">
					    <div class="controls">
					      <button type="submit" class="btn btn-primary">Login</button>
					    </div>
					  </div>
					</form>
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
	<!--
	<script src="js/bootstrap-modal.js"></script>
    	<script src="js/bootstrap-scrollspy.js"></script>
    	<script src="js/bootstrap-popover.js"></script>

    	<script src="js/bootstrap-button.js"></script>
    	<script src="js/bootstrap-collapse.js"></script>
    	<script src="js/bootstrap-carousel.js"></script>
    	-->

  </body>
</html>
