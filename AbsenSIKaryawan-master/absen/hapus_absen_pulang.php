<?php 

include '../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM tb_absen_pulang WHERE id = '$id'";
$hapus = mysqli_query($koneksi, $sql);

if ($hapus) {
	header("location: ../data_absen_pulang.php");
}else{
echo "bakekok bunda";
} 
 ?>
