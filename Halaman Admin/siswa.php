<?php 
session_start(); 
if (!isset($_SESSION['username'])){  
	header("location:index.php"); } 
	?> 
<!DOCTYPE html> 
<html> 
<head>  
	<title>Data Siswa</title> 
</head> 
<body>  
	<h1 align="center">Data Siswa</h1>  
	<table align="center" border="1"> 
  <tr>    
  	<td>No</td>    
  	<td>NIS</td>    
  	<td>Nama</td>    
  	<td>Jenis Kelamin</td>    
  	<td>Kelas</td>    
  	<td>Jurusan</td>    
  	<td colspan="2"><a href="siswa-tambah.php">Tambah</a></td>   
  </tr>   
  <?php   $no=1;   
  include('koneksi.php');   
  $siswa=mysqli_query($koneksi,"select id_siswa,nis,nama,jk,kelas,jurusan,password from siswa,jurusan where siswa.id_jurusan=jurusan.id_jurusan");   
  while ($data=mysqli_fetch_assoc($siswa)){   
  	?>   
  	<tr>    
  		<td><?php echo $no++; ?></td>    
  		<td><?php echo $data['nis']; ?></td>    
  		<td><?php echo $data['nama']; ?></td>    
  		<td><?php echo $data['jk']; ?></td>    
  		<td><?php echo $data['kelas']; ?></td>    
  		<td><?php echo $data['jurusan']; ?></td>    
  		<td><a href="siswa-edit.php?id_siswa=<?php echo $data['id_siswa']; ?>">Edit</a></td>    
  		<td><a href="siswa-delete.php?id_siswa=<?php echo $data['id_siswa']; ?>">Delete</a></td>   
  	</tr>   
  	<?php   
  }   
  ?>  
</table> 
</body> 
</html>