<head>
	 
</head>
<?php 
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$id = $_SESSION['idsi'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id_karyawan= '$id'");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_karyawan = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id_karyawan= '$id' LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;


while ($row=mysqli_fetch_array($data_karyawan)) {
	



 ?>

  <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['id_karyawan']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                                <td><?php echo $row['alasan']; ?></td>
                                                <td><?php echo $row['waktu']; ?></td>
                                               
                                                <td>
                                                    <?php 

                                                    if ($row['bukti']!='') {
                                                        echo "<img src=\" modul/karyawan/images/$row[bukti]\" />";
                                                    }else{
                                                        echo "images";
                                                    }

                                                     ?>
                                                    

                                                </td>
                                                


                                                
                                            </tr>
                                        <?php } ?>

