<?php 
session_start(); 
if (!isset($_SESSION['username'])){  
	header("location:index.php"); } 
	?> 
	<!DOCTYPE html> 
	<html> 
	<head>  
		<title>Tambah Jurusan</title> 
	</head> 
	<body>  
		<h1 align="center">Tambah Jurusan</h1>  
		<form method="post">   
			<table border="1" align="center">    
				<tr>     
					<td>Jurusan</td>     
					<td>:</td>     
					<td><input type="text" name="jurusan" required=""></td>    
				</tr>    
				<tr> 
    <td colspan="3"><input type="submit" name="tambah" value="Tambah">      
    	<input type="reset" name="reset" value="Reset"></td>    
    </tr>   
</table>  
</form> 
</body> 
</html> 
 
<?php  
include ('koneksi.php'); 
if (isset($_POST['tambah'])){  
	$jurusan=$_POST['jurusan']; 
	$tambah=mysqli_query($koneksi,"insert into jurusan values('','$jurusan')");  
	if ($tambah){   header("location:jurusan.php");  
	}else{   
		echo '<script language="javascript">alert("Gagal Input Jurusan!"); window.history.back();</script>';  } } ?>