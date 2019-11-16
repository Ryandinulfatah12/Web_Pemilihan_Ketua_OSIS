<?php 
include ('koneksi.php'); 
$id_admin=$_GET['id_admin']; 
$delete=mysqli_query($koneksi,"delete from admin where id_admin='$id_admin'"); 
if ($delete){  header("location:admin.php"); 
}else{  
	echo '<script language="javascript">alert("Gagal Hapus Admin!"); window.history.back();</script>'; } ?> 
 