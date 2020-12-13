<?php
	session_start();
	include '../koneksi.php';
	
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$query = mysqli_query($kon, "SELECT * FROM user WHERE username='$username' && password='$password'");
	
	$login = mysqli_num_rows($query);
	if($login > 0){
		$_SESSION['username'] = $username;
		header('location:home.php');
	}else{		
		?>
		<script type="text/javascript">
			alert('Username Atau Password Salah');
			top.location='index.php';
		</script>
<?php
		}
?>