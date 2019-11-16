<!DOCTYPE html> 
<html> 
<head>  
	<title>Login Admin</title> 
</head> 
<body>  
	<h1 align="center">Login Admin</h1>  
	<form method="post">   <table align="center" border="1">    
		<tr>     
			<td>Username</td>     
			<td>:</td> 
    <td><input type="text" name="username" placeholder="Username"></td>    
</tr>    
<tr>     
	<td>Password</td>     
	<td>:</td>     
	<td><input type="password" name="password" placeholder="Password"></td>    
</tr>    
<tr>     
	<td><input type="submit" name="login" value="LOGIN">      
		<input type="reset" name="reset" value="Reset">
		<br><a href="http://localhost/pilketos2/Halaman%20Siswa/">Login Siswa</a>
	</td>

</tr> 
</table>  
</form>

</body> 
</html> 
 
<?php include ('koneksi.php'); 
if (isset($_POST['login'])){  
$username=$_POST['username'];  
$password=$_POST['password']; 
 
 $admin=mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");  
 $data=mysqli_fetch_assoc($admin);  
 $cek=mysqli_num_rows($admin); 
 
 if ($cek>0){   
 	session_start();   

 $_SESSION['username']=$data['username'];   
 $_SESSION['password']=$data['password'];   
 header("location:indexadmin.php");  
}else{   
header("location:index.php");  
} 
} 
?>