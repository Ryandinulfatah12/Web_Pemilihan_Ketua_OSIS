<?php session_start(); 
if (!isset($_SESSION['username'])){  
	header("location:index.php"); } 
	?> 
<!DOCTYPE html> 
<html> 
<head>  
	<title>Tambah Siswa</title> 
</head> 
<body> 
	<h1 align="center">Tambah Siswa</h1>  
	<form method="post">   
		<table border="1" align="center">    
			<tr>     
				<td>NIS</td>     
				<td>:</td>     
				<td><input type="number" name="nis"></td> 
   </tr>    
   <tr>     
   	<td>Nama</td>     
   	<td>:</td>     
   	<td><input type="text" name="nama"></td>    
   </tr>    
   <tr>     
   	<td>Jenis Kelamin</td>     
   	<td>:</td>    
   	 <td><input type="radio" name="jk" value="L">Laki-Laki      
   	 	<input type="radio" name="jk" value="P">Perempuan</td>   
   	 	</tr>    
   	 	<tr>     
   	 		<td>Kelas</td>     
   	 		<td>:</td>     
   	 		<td>      
   	 			<select name="kelas">       
   	 				<option selected="" disabled="">-Pilih Kelas--</option>       
   	 				<option value="X">X</option>       
   	 				<option value="XI">XI</option>       
   	 				<option value="XII">XII</option>      
   	 			</select>     
   	 		</td>    
   	 	</tr>    
   	 	<tr>     
   	 		<td>Jurusan</td>     
   	 		<td>:</td>     
   	 		<td><select name="id_jurusan">      
   	 			<option value="Pilih jurusan" selected="" disabled="">Pilih Jurusan</option>      
   	 			<?php      
   	 			include ('koneksi.php');      
   	 			$jurusan=mysqli_query($koneksi,"select * from jurusan");      
   	 			while ($data=mysqli_fetch_assoc($jurusan)){      
   	 				?>      
   	 				<option value="<?php echo $data['id_jurusan']; ?>">
   	 					<?php echo $data['jurusan']; ?>
   	 						
   	 					</option>      
   	 					<?php      
   	 				}      
   	 				?>     
   	 			</select></td>    
   	 		</tr>    
   	 		<tr>     
   	 			<td>Password</td>     
   	 			<td>:</td>     
   	 			<td><input type="password" name="password"></td>    
   	 		</tr>    
   	 		<tr>     
   	 			<td colspan="3"><input type="submit" name="tambah" value="Tambah">      
   	 				<input type="reset" name="reset" value="Reset"></td> 
   </tr>   
</table>  
</form> 
</body> 
</html> 
 
<?php  if (isset($_POST['tambah'])){  
	$nis=$_POST['nis'];  $nama=$_POST['nama'];  
	$jk=$_POST['jk'];  $kelas=$_POST['kelas'];  
	$id_jurusan=$_POST['id_jurusan'];  $password=md5($_POST['password']); 
	$tambah=mysqli_query($koneksi,"insert into siswa values('','$nis','$nama','$jk','$kelas','$id_jurusan','$password')");  
	if ($tambah){   header("location:siswa.php");  
	}else{   
		echo '<script language="javascript">alert("Gagal Input Siswa!"); window.history.back();</script>';  
	}
	} 
	?>