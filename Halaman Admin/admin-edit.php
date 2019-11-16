<?php 
session_start(); 
if (!isset($_SESSION['username'])){  
	header("location:index.php"); } 
	include ('koneksi.php'); $id_admin=$_GET['id_admin']; 
	$edit=mysqli_query($koneksi,"select * from admin where id_admin='$id_admin'"); 
	$data=mysqli_fetch_assoc($edit); ?> 
<!DOCTYPE html> 
<html> 
<head>  
	<title>Edit Admin</title> 
</head> 
<body>  
	<h1 align="center">Edit admin</h1>  
	<form method="post">   
		<table border="1" align="center">    
			 
			<tr>     
				<td>Username</td>     
				<td>:</td>     
				<td><input type="text" name="username" value="<?php echo $data['username']; ?>" required=""></td>    
			</tr>    
			<tr>     
				<td>Password</td>     
				<td>:</td>     
				<td><input type="password" name="password" value="<?php echo $data['password']; ?>" required=""></td>    
			</tr>    
			<tr> 
    <td colspan="3"><input type="submit" name="edit" value="Edit">      
    	<input type="reset" name="reset" value="Reset"></td>    
    </tr>  
    </table>  
</form> 
</body> 
</html> 
 
<?php  if (isset($_POST['edit'])){  $nama=$_POST['nama'];  $username=$_POST['username'];  $password=md5($_POST['password']); 
 
 $edit=mysqli_query($koneksi,"update admin set nama='$nama',username='$username',password='$password' where id_admin='$id_admin'");  
 if ($edit){   
 	header("location:admin.php");  }else{   echo '<script language="javascript">alert("Gagal Edit Admin!"); window.history.back();</script>';  } } ?>