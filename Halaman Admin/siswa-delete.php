<?php 
include ('koneksi.php'); 
$id_siswa=$_GET['id_siswa']; 
$delete=mysqli_query($koneksi,"delete from siswa where id_siswa='$id_siswa'"); 
if ($delete){  header("location:siswa.php"); 
}else{  
	echo '<script language="javascript">alert("Gagal Hapus Siswa!"); window.history.back();</script>'; } ?> 