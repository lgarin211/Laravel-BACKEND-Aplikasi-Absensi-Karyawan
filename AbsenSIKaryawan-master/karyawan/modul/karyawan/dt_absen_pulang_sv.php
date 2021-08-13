<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
	
	$id = $_POST['id'];
	$id_karyawan = $_POST['id_karyawan'];
	$nama = $_POST['nama'];
	$keterangan = $_POST['keterangan'];
	$waktu = $_POST['waktu'];

	//untuk gambar
	$bukti = $_FILES['bukti']['name'];
	$tmp = $_FILES['bukti']['tmp_name'];
	$buktibaru = date('dmYHis').$bukti;
	$path = "img_absen_pulang/".$buktibaru;
}

if (move_uploaded_file($tmp, $path)) {
	$sql = "SELECT * FROM tb_absen_pulang WHERE id = '".$id."'";
	mysqli_query($koneksi, $sql);

}

$query = "INSERT INTO tb_absen_pulang SET id_karyawan = '$id_karyawan', nama='$nama', keterangan='$keterangan', waktu='$waktu', bukti='$buktibaru'";
mysqli_query($koneksi, $query);

if ($query) {
	echo "<script>alert('Anda sudah absen pulang untuk hari ini') </script>";
	echo '<script>window.history.back()</script>';
}else{
	echo "gagal";
}

 ?>