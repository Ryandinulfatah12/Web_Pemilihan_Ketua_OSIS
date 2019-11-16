<?php session_start(); 
if (!isset($_SESSION['nis'])){  
	header("location:index.php"); 
}
include ('koneksi.php'); 
$nis=$_SESSION['nis']; 
$siswa=mysqli_query($koneksi,"select * from siswa where nis='$nis'"); 
$data_siswa=mysqli_fetch_assoc($siswa); 
$id_siswa=$data_siswa['id_siswa']; 
$kandidat=mysqli_query($koneksi,"select * from kandidat"); 
?>
<!DOCTYPE html> 
<html>
<head>  
	<title>Halaman Voting</title> 
</head> 
<body>  
	<h1 align="center">Halaman Voting</h1>  
	<a href="logout.php">Logout</a>  
	<table align="center" border="0">   
		<tr>   
			<?php   while ($data=mysqli_fetch_assoc($kandidat)){   
				?>    
				<td bgcolor="aqua">     
					<p align="center">Kandidat No <?php echo $data['no_urut']; ?></p>
					     <hr><br>  
					     <a href="voting.php?id_kandidat=<?php echo 
					     $data['id_kandidat']; ?>&id_siswa=<?php echo $id_siswa;?>"><img src="file/<?php echo $data['foto']; ?>" height="200px" title="Klik untuk memilih kandidat <?php echo $data['no_urut']; ?>">
					     </a><hr>     
					     <a href="kandidat-detail.php?id_kandidat=<?php echo $data['id_kandidat']; ?>"><p align="center">Lihat Detail></p></a>    
					 </td>
					     <td>&nbsp;</td>   
					 <?php   
					 }   
					 ?>
		</tr>  
	</table> 
</body> 
</html>