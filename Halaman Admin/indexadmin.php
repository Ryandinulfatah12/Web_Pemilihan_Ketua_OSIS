<?php 
session_start(); 
if (!isset($_SESSION['username'])){  
	header("location:index.php"); } 
	include('koneksi.php'); 
	$kandidat=mysqli_query($koneksi,"select * from kandidat"); 
$data_pemilihan=mysqli_query($koneksi,"select * from data_pemilihan"); 
$jumlah_voting=mysqli_num_rows($data_pemilihan); 
?> 
<a href="logout.php">Logout</a> 
<!DOCTYPE html> 
<html> 
<head>  
	<title>Halaman Admin</title> 
</head> 
<body>  
	<h1 align="center">Hasil Voting</h1>  
	<table align="center" border="1">   
		<tr>    
			<td rowspan="4">     
				<ul>      
					<li><a href="admin.php">Admin</a></li>      
					<li><a href="kandidat.php">Kandidat</a></li>      
					<li><a href="siswa.php">Siswa</a></li>      
					<li><a href="data_pemilihan.php">Data Pemilihan</a></li>      
					<li><a href="Jurusan.php">Jurusan</a></li>     
				</ul>    
			</td>   
		</tr>   
		<?php   
		while ($data_kandidat=mysqli_fetch_assoc($kandidat)){    
			$vote=($data_kandidat['voting']/$jumlah_voting)*100;   
			?>   
			<tr>    
				<td>No Urut <?php echo $data_kandidat['no_urut']; 
				?>
				</td>    
				<td><img src="vote.png" height="50px" width="<?php echo round ("$vote"); ?>%">
				</td>    
				<td><?php echo round ("$vote"); ?>%</td>   
			</tr>   
			<?php   
			}   
			?>  
	</table> 
</body> 
</html>