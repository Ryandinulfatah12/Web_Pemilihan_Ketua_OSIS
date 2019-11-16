<?php 

session_start();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Tambah Admin</title>
 </head>
 <body>
 	<h1 align="center">Tambah Data Admin</h1>
 	<form method="post">
 		<table border="1" align="center">
 			
 			<tr>
 				<td>Nama</td>
 				<td>:</td>
 				<td><input type="text" name="nama"></td>
 			</tr>
			<tr>
 				<td>Username</td>
 				<td>:</td>
 				<td><input type="text" name="username"></td>
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

 <?php 

include ('koneksi.php');
if (isset($_POST['tambah'])) {
	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$password=($_POST['password']);

	$tambah=mysqli_query($koneksi, "insert into admin values('','$nama','$username','$password') ");
	if ($tambah) {
		header("location:admin.php");
	} else {
		echo '<script language="javascript">alert("Gagal Input Data admin!"); window.history.back();</script>';
	}
	
}
  ?>