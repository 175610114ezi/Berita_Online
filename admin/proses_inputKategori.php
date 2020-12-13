<?php
	include '../koneksi.php';

	$id_kategori = $_POST['id_kategori'];
	$nm_kategori = $_POST['nm_kategori'];

	if (isset($_POST['simpan'])) {
		if ($id_kategori=="" OR $nm_kategori=="") {
			
			?>
			<script type="text/javascript">
				alert("ISIAN KOSONG");
				top.location="inputKategori.php";
			</script>
			<?php
		}else{
			$query = "INSERT INTO kategori(id_kategori, nm_kategori)
			 		  VALUES('$id_kategori','$nm_kategori')";
			$query = mysqli_query($kon, $query);
			header('Location:kategori.php');
		}
	}
	/*
	if(isset($_GET['id'])){
	$id_kategori = $_GET['id'];
	$query = mysqli_query($kon, "DELETE FROM kategori WHERE id_kategori='$id_kategori'")or die(mysqli_error($kon));
	header('Location:home.php?menu=kategori');
	}
	*/
?>