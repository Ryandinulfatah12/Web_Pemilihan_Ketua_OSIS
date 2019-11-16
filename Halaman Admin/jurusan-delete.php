<?php 
include ('koneksi.php'); 
$id_jurusan=$_GET['id_jurusan']; 
$delete=mysqli_query($koneksi,"delete from jurusan where id_jurusan='$id_jurusan'"); 
if ($delete){  
	header("location:jurusan.php"); 
}else{  
	echo '<script language="javascript">alert("Gagal Hapus Jurusan!"); window.history.back();</script>'; } ?>