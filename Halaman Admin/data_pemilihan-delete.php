<?php 
include ('koneksi.php'); 
$id_pemilihan=$_GET['id_pemilihan']; 
$delete=mysqli_query($koneksi,"delete from data_pemilihan where id_pemilihan='$id_pemilihan'"); 
if ($delete){  header("location:data_pemilihan.php"); 
}else{  
	echo '<script language="javascript">alert("Gagal Hapus data pemilihan!"); window.history.back();</script>'; } ?> 
	