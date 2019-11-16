<?php 
session_start(); 
if (!isset($_SESSION['username'])){  
	header("location:index.php"); } 
	?> 
	<!DOCTYPE html> 
	<html> 
	<head>  
		<title>Data Pemilihan</title> 
	</head> 
	<body> 
 <h1 align="center">Data Pemilihan</h1>  
 <table align="center" border="1">   
 	<tr>    
 		<td>No</td>    
 		<td>Nama</td>    
 		<td>No Urut Kandidat</td>    
 		<td>Tanggal</td>    
 		<td>Jam</td>    
 		<td>Opsi</td>   
 	</tr>   
 	<?php   
 	$no=1;   
 	include('koneksi.php');   
 	$data_pemilihan=mysqli_query($koneksi,"select id_pemilihan,siswa.nama,no_urut,tanggal,jam from data_pemilihan,siswa,kandidat where data_pemilihan.id_siswa=siswa.id_siswa and data_pemilihan.id_kandidat=kandidat.id_kandidat");   
 	while ($data=mysqli_fetch_assoc($data_pemilihan)){   ?>   
 	<tr>    
 		<td><?php echo $no++; ?></td>    
 		<td><?php echo $data['nama']; ?></td>   
 		 <td><?php echo $data['no_urut']; ?></td>    
 		 <td><?php echo $data['tanggal']; ?></td>    
 		 <td><?php echo $data['jam']; ?></td>    
 		 <td><a href="datapemilihan-delete.php?id_pemilihan=<?php echo $data['id_pemilihan']; ?>">Delete</a></td>   
 		</tr>   
 		<?php   
 	}   
 	?>  
 	</table> 
 </body> 
 </html>