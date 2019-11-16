<?php 
include ('koneksi.php');
$id_kandidat=$_GET['id_kandidat'];
$foto=$_GET['foto'];
$target="../Halaman Siswa/file/$foto";
$delete=mysqli_query($koneksi, "delete from kandidat where id_kandidat='$id_kandidat'");
if ($delete) {
	unlink($target);
	header("location:kandidat.php");
 } else {
 	echo '<script language="javascript">alert("Gagal Hapus Kandidat!")
		window.history.back();</script>';
 }
 ?>
