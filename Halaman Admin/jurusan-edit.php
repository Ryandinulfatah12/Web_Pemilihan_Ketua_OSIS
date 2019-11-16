<?php 
session_start(); 
if (!isset($_SESSION['username'])){  
	header("location:index.php"); } 
 
include ('koneksi.php'); 
$id_jurusan=$_GET['id_jurusan']; 
$edit=mysqli_query($koneksi,"select * from jurusan where id_jurusan='$id_jurusan'"); 
$data=mysqli_fetch_assoc($edit);
 ?> 
<!DOCTYPE html> 
<html> 
<head>  
	<title>Edit Jurusan</title> 
</head> 
<body>  
	<h1 align="center">Edit Jurusan</h1>  
	<form method="post">   
		<table border="1" align="center">    
			<tr>     
				<td>Jurusan</td>     
				<td>:</td>     
				<td><input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" required=""></td>    
			</tr>    
			<tr>     
				<td colspan="3"><input type="submit" name="edit" value="Edit"> 
     <input type="reset" name="reset" value="Reset"></td>    
 </tr>   
</table>  
</form> 
</body> 
</html> 
 
<?php  
include ('koneksi.php'); 
if (isset($_POST['edit'])){  
	$jurusan=$_POST['jurusan']; 
 
 $edit=mysqli_query($koneksi,"update jurusan set jurusan='$jurusan' where id_jurusan='$id_jurusan'");  
 if ($edit){   
 	header("location:jurusan.php");  
 }else{   
 	echo '<script language="javascript">alert("Gagal Edit jurusan!"); window.history.back();</script>';  } } ?>