<?php
	include '../koneksi.php';
	
	$id_berita 	 = $_POST['id_berita'];
	$id_kategori = $_POST['id_kategori'];
	$judul		 = $_POST['judul'];
	$tanggal	 = $_POST['tanggal'];
	$tgl		 = date('Y-m-d');
	$isi		 = $_POST['isi'];
	
	// Ambil Data yang Dikirim dari Form
	$nama_file = $_FILES['file_gambar']['name'];
	$ukuran_file = $_FILES['file_gambar']['size'];
	$tipe_file = $_FILES['file_gambar']['type'];
	$tmp_file = $_FILES['file_gambar']['tmp_name'];

	if($isi=="" OR $judul==""){
	?>
	<script type="text/javascript">
		alert("ISIAN MASIH ADA YANG KOSONG");
		top.location="inputBerita.php";
	</script>
<?php
	}else{
		// Set path folder tempat menyimpan gambarnya
		$path = "../gambar/".$nama_file;

		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
		// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
		if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
		// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
		// Proses upload
		if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		// Jika gambar berhasil diupload, Lakukan :	
		// Proses simpan ke Database
		
			$query = "INSERT INTO isi_berita(id_berita, id_kategori, judul, tanggal, waktu, gambar, isi)
				  VALUES('$id_berita', '$id_kategori', '$judul', '$tgl', now(), 'gambar/".$nama_file."', '$isi')";
			$query = mysqli_query($kon, $query);
		
		if($query){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
		?>
		<script type="text/javascript">
			alert("Data Berhasil Disimpan");
			top.location="lihatBerita.php";
		</script>
		<?php
		}else{
        // Jika Gagal, Lakukan :
        die ("Ada yang salah".mysqli_error($kon));
		}
		}else{
		// Jika gambar gagal diupload, Lakukan :
		?>
		<script type="text/javascript">
			alert("Maaf, Gambar gagal untuk diupload");
			top.location="inputBerita.php";
		</script>
		<?php
		}
		}else{
		// Jika ukuran file lebih dari 1MB, lakukan :
		?>
		<script type="text/javascript">
			alert("Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB");
			top.location="inputBerita.php";
		</script>
		<?php
		}
		}else{
		// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		?>
		<script type="text/javascript">
			alert("Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG");
			top.location="inputBerita.php";
		</script>
		<?php
		}
		}
		
		
?>
     