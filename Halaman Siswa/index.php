<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
</head>
<body>
	<h1 align="center">Login Siswa !!!</h1>
	<form method="post">
	<table align="center" border="2">
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><input type="text" name="nis"></td>
		</tr>

		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password"></td>
		</tr>

		<tr>
			<td><input type="submit" name="login" colspan="3" value="LOGIN">
				<input type="submit" name="reset" colspan="3" value="RESET">
			<br><a href="http://localhost/pilketos2/Halaman%20Admin/index.php">Login Administrator</a>
			</td>
		</tr>

		<tr></tr>
	</table>
	</form>
</body>
</html>

<?php 

include('koneksi.php');
if (isset($_POST['login'])) {
	$nis = $_POST['nis'];
	$password = $_POST['password'];

	$siswa = mysqli_query($koneksi, "select * from siswa where nis='$nis' and password='$password'")or die(mysqli_error($koneksi));
	$data = mysqli_fetch_assoc($siswa);
	$cek = mysqli_num_rows($siswa);

	if ($cek > 0) {
		session_start();
		$_SESSION['nis'] = $data['nis'];
		$_SESSION['password'] = $data['password'];
		header("location:indexsiswa.php");
		// echo "sukses";
	} else {
		echo "gagal";
	}
	
}

 ?>