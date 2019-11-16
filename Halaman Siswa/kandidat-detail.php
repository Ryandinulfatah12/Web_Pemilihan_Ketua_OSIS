<?php session_start(); 
if (!isset($_SESSION['nis'])){  
	header("location:index.php"); 
}
include ('koneksi.php'); 
$id_kandidat=$_GET['id_kandidat']; 
$kandidat=mysqli_query($koneksi,"select * from kandidat where id_kandidat='$id_kandidat'"); 
$data=mysqli_fetch_assoc($kandidat); 
?> 
<!DOCTYPE html> 
<html> 
<head>  
	<title>Detail Kandidat</title> 
</head> 
<body>   
	<h1 align="center">Detail Kandidat No <?php echo $data['no_urut']; 
	?></h1>   
	<table border="1" align="center">    
		<tr>     
			<td colspan="3" align="center"><img src="file/<?php echo $data['foto']; ?>" height="200px"></td>    
		</tr>    
		<tr>     
			<td>Nama</td>     
			<td>:</td>     
			<td><?php echo $data['nama']; ?></td>    
		</tr>    
		<tr>     
			<td>Visi</td>     
			<td>:</td>     
			<td><?php echo $data['visi']; ?></td>    
		</tr>    
		<tr>     
			<td>Misi</td>     
			<td>:</td>     
			<td><?php echo $data['misi']; ?></td>    
		</tr>    
		<tr>     
			<td colspan="3" align="center"><a href="indexsiswa.php">Kembali</td></td>    
			</tr>   
		</table> 
	</body> 
	</html> 