<?php
session_start();
if (!isset($_SESSION['username'])){
header("location:index.php");
}
include ('koneksi.php');
$id_siswa=$_GET['id_siswa'];
$edit=mysqli_query($koneksi,"select
id_siswa,nis,nama,jk,kelas,siswa.id_jurusan,jurusan,password from
siswa,jurusan where siswa.id_jurusan=jurusan.id_jurusan and
id_siswa='$id_siswa'");
$data=mysqli_fetch_assoc($edit);
$jk=$data['jk'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Siswa</title>
</head>
<body>
<h1 align="center">Edit Siswa</h1>
<form method="post">
<table border="1" align="center">
<tr>
<td>NIS</td>
<td>:</td>
<td><input type="number" name="nis"
value="<?php echo $data['nis']; ?>"></td>
</tr>
<tr>
<td>Nama</td>
<td>:</td>
<td><input type="text" name="nama"
value="<?php echo $data['nama']; ?>"></td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td>:</td>
<td>
<?php
if ($jk=="L"){
echo '<input type="radio"
name="jk" value="L" checked>Laki-Laki
<input type="radio" name="jk"
value="P">Perempuan</td>';
}else{
echo '<input type="radio"
name="jk" value="L">Laki-Laki
<input type="radio" name="jk"
value="P" checked>Perempuan</td>';
}
?>
</tr>
<tr>
<td>Kelas</td>
<td>:</td>
<td>
<select name="kelas">
<option selected="" value="<?php
echo $data['kelas']; ?>"><?php echo $data['kelas']; ?></option>
<option value="X">X</option>
<option value="XI">XI</option>
<option value="XII">XII</option>
</select>
</td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="password"
value="<?php echo $data['password']; ?>"></td>
</tr>
<tr>
<td>Jurusan</td>
<td>:</td>
<td><select name="id_jurusan">
<option value="<?php echo
$data['id_jurusan']; ?>" selected=""><?php echo $data['jurusan'];
?></option>
<?php
$jurusan=mysqli_query($koneksi,"select
* from jurusan");
while
($data=mysqli_fetch_assoc($jurusan)){
?>
<option value="<?php echo
$data['id_jurusan']; ?>"><?php echo $data['jurusan']; ?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td colspan="3"><input type="submit"
name="edit" value="Edit"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
if (isset($_POST['edit'])){
$nis=$_POST['nis'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$kelas=$_POST['kelas'];
$id_jurusan=$_POST['id_jurusan'];
$password=md5($_POST['password']);
$update=mysqli_query($koneksi,"update siswa set
nis='$nis',nama='$nama',jk='$jk',kelas='$kelas',id_jurusan='$id_jurusan',password='$password' where id_siswa='$id_siswa'");
if ($update){
header("location:siswa.php");
}else{
echo '<script language="javascript">alert("Gagal Edit
Siswa!"); window.history.back();</script>';
}
}
?>
