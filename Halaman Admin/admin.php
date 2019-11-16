<?php 
session_start(); 
if (!isset($_SESSION['username'])){  
	header("location:index.php"); } 
	?> 
<!DOCTYPE html> 
<html> 
<head>  
	<title>Data Admin</title> 
</head> 
<body>  
	<h1 align="center">Data Admin</h1>  
	<table align="center" border="1">   
		<tr>    
			<td>No</td>    
			<td>Nama</td>    
			<td>Username</td>    
			<td colspan="2">
				<a href="admin-tambah.php">Tambah</a></td>   
		</tr>   
		<?php   
		$no=1;   
		include('koneksi.php');   
		$admin=mysqli_query($koneksi,"select * from admin");   
		while ($data=mysqli_fetch_assoc($admin)){   
			?>   
			<tr>    
				<td><?php echo $no++; ?></td>    
				<td><?php echo $data['nama']; ?></td>    
				<td><?php echo $data['username']; ?></td>    
				<td><a href="admin-edit.php?id_admin=<?php echo $data['id_admin']; ?>">Edit</a></td> 
    			<td><a href="admin-delete.php?id_admin=<?php echo $data['id_admin']; ?>">Delete</a></td>   
			</tr>   
			<?php   
		}   
		?>  
	</table> 
</body> 
</html>