<?php
	include '../koneksi.php';
		$id = $_GET['id'];
		$query = mysqli_query($kon, "DELETE FROM isi_berita WHERE id_berita='$id'")or die(mysqli_error($kon));
		header('Location:lihatBerita.php');
?>