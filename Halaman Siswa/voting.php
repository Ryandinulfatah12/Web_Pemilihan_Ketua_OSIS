<?php 
include ('koneksi.php'); 
$id_kandidat=$_GET['id_kandidat']; 
$id_siswa=$_GET['id_siswa']; 
date_default_timezone_set("Asia/Jakarta"); 
$tanggal=date("Y-m-d"); 
$jam=date("H:i:s"); 
$kandidat=mysqli_query($koneksi,"select * from kandidat where id_kandidat='$id_kandidat'"); 
$data_kandidat=mysqli_fetch_assoc($kandidat); 
$voting=$data_kandidat['voting']+1; 
$data_pemilihan=mysqli_query($koneksi,"select * from data_pemilihan where id_siswa='$id_siswa'"); 
$cekdata_pemilihan=mysqli_num_rows($data_pemilihan); 
if ($cekdata_pemilihan==0){  
	$pemilihan=mysqli_query($koneksi,"insert into data_pemilihan values('','$id_siswa','$id_kandidat','$tanggal','$jam')");  
	if ($pemilihan){   
		$update=mysqli_query($koneksi,"update kandidat set voting='$voting' where id_kandidat='$id_kandidat'");   
		if ($update){    
			?><script type="text/javascript">alert("Berhasil melakukan voting");</script>    
				<script type="text/javascript">document.location.href="indexsiswa.php"</script><?php   
			}else{    
				?><script type="text/javascript">alert("Gagal melakukan voting!");</script>    
					<script type="text/javascript">document.location.href="indexsiswa.php"</script><?php   
				}  
			} 
		}else{  
			?><script type="text/javascript">alert("Anda Sudah Melakukan Voting!");</script>  
				<script type="text/javascript">document.location.href="indexsiswa.php"</script><?php 
			} 
			?> 