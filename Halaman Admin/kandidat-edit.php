<?php 
session_start(); 
if (!isset($_SESSION['username'])){ 
header("location:index.php"); 
} 
include ('koneksi.php'); 
$id_kandidat=$_GET['id_kandidat']; 
$kandidat=mysqli_query($koneksi,"select * from kandidat where  
id_kandidat='$id_kandidat'"); 
$data=mysqli_fetch_assoc($kandidat); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>Edit Kandidat</title> 
</head> 
<body> 
	<h1 align="center">Edit Kandidat</h1> 
		<form method="post" enctype="multipart/form-data"> 
			<table border="1" align="center"> 
				<tr> 
					<td>Nama</td> 
					<td>:</td> 
					<td><input type="text" name="nama"  
					value="<?php echo $data['nama']; ?>" required=""></td> 
				</tr> 
				<tr> 
					<td>No Urut</td> 
					<td>:</td> 
					<td><input type="number" name="no_urut"  
					value="<?php echo $data['no_urut']; ?>" required=""></td> 
				</tr> 
				<tr> 
					<td>Foto</td> 
					<td>:</td> 
					<td><input type="file" name="foto"  
					required=""></td> 
				</tr> 
				<tr> 
					<td>Visi</td> 
					<td>:</td> 
					<td>
					<textarea name="visi"  
					placeholder="Visi" required=""><?php echo $data['visi']; ?></textarea> 
					</td> 
				</tr> 
				<tr> 
					<td>Misi</td> 
					<td>:</td> 
					<td> 
					<textarea name="misi"  
					placeholder="Misi" required=""><?php echo $data['misi']; ?></textarea> 
					</td> 
				</tr> 
				<tr> 
					<td colspan="3"><input type="submit"  
					name="edit" value="Edit"> 
					<input type="reset" name="reset"  
					value="Reset"></td> 
				</tr> 
		</table> 
	</form> 
</body> 
</html> 

<?php  
if (isset($_POST['edit'])){ 
$nama=$_POST['nama']; 
$no_urut=$_POST['no_urut']; 
$visi=$_POST['visi']; 
$misi=$_POST['misi']; 
$foto=$_FILES['foto']['name']; 
$foto_tmp=$_FILES['foto']['tmp_name']; 
$format=pathinfo($foto,PATHINFO_EXTENSION); 

if(($format == "jpg") or ($format == "png") or ($format == "jpeg")  
or ($format == "JPG") or ($format == "PNG") or ($format == "JPEG")){ 
move_uploaded_file($foto_tmp, '../file/'.$foto); 
$edit=mysqli_query($koneksi,"update kandidat set  
nama='$nama',no_urut='$no_urut',foto='$foto',visi='$visi',misi='$misi' where id_kandidat='$id_kandidat'"); 

if ($edit){ 
header("location:kandidat.php"); 
}else{ 
echo '<script language="javascript">alert("Gagal  
Input Kandidat!"); window.history.back();</script>'; 
} 
}else{ 
echo '<script language="javascript">alert("Format Foto  
Tidak Sesuai!"); window.history.back();</script>'; 
} 
} 
?>
