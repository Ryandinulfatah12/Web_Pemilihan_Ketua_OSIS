<?php 
session_start(); 
if (!isset($_SESSION['username'])){  
	header("location:index.php"); } 
	?> 
<!DOCTYPE html> 
<html> 
<head>  
	<title>Data Jurusan</title> 
</head> 
<body>  
	<h1 align="center">Data Jurusan</h1>  
	<table align="center" border="1">   
		<tr>    
			<td>No</td>    
			<td>Jurusan</td>    
			<td colspan="2"><a href="jurusan-tambah.php">Tambah</a></td>   
		</tr>   
		<?php   
		$no=1;   
		include('koneksi.php');   
		$jurusan=mysqli_query($koneksi,"select * from jurusan");   
		while ($data=mysqli_fetch_assoc($jurusan)){   
			?>   
		<tr>    
			<td><?php echo $no++; ?></td>    
			<td><?php echo $data['jurusan']; ?></td>    
			<td><a href="jurusan-edit.php?id_jurusan=<?php echo $data['id_jurusan']; ?>">Edit</a></td>    
			<td><a href="jurusan-delete.php?id_jurusan=<?php echo $data['id_jurusan']; ?>">Delete</a></td>   
		</tr>   
		<?php   
	}   
	?>  
</table> 
</body> 
</html>