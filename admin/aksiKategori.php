<?php
	include '../koneksi.php';

	$id_kategori = $_POST['id_kategori'];
	$nm_kategori = $_POST['nm_kategori'];
	
	if(isset($_POST['simpan'])){
		$query = mysqli_query($kon, "UPDATE kategori SET nm_kategori='$nm_kategori' WHERE id_kategori='$id_kategori'")or die(mysqli_error($kon));
		header('Location:kategori.php');
	}else{
		$id = $_GET['id'];
		$query = mysqli_query($kon, "DELETE FROM kategori WHERE id_kategori='$id'")or die(mysqli_error($kon));
		header('Location:kategori.php');
	}
	/*
	if(isset($_GET['id'])){
	$id_kategori = $_GET['id'];
	$query = mysqli_query($kon, "DELETE FROM kategori WHERE id_kategori='$id_kategori'")or die(mysqli_error($kon));
	header('Location:home.php?menu=kategori');
	}
	*/
?>