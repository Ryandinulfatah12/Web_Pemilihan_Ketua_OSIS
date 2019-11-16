<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kandidat</title>
</head>
<body>
    <h1 align="center">Tambah Kandidat</h1>
    <form method="post" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" required=""></td>
            </tr>
            <tr>
                <td>No Urut</td>
                <td>:</td>
                <td><input type="number" name="no_urut" required=""></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td><input type="file" name="foto" required=""></td>
            </tr>
            <tr>
                <td>Visi</td>
                <td>:</td>
                <td>
                    <textarea name="visi" placeholder="Visi" required=""></textarea>
                </td>
            </tr>
            <tr>
                <td>Misi</td>
                <td>:</td>
                <td>
                    <textarea name="misi" placeholder="Misi" required=""></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="tambah" value="Tambah">
                    <input type="reset" name="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php 
include ('koneksi.php');
if (isset($_POST['tambah'])) {
        $nama=$_POST['nama'];
        $no_urut=$_POST['no_urut'];
        $visi=$_POST['visi'];
        $misi=$_POST['misi'];
        $foto=$_FILES['foto']['name'];
        $foto_tmp=$_FILES['foto']['tmp_name'];
        $format=pathinfo($foto,PATHINFO_EXTENSION);

        if(($format == "jpg") or ($format == "png") or ($format == "jpeg") or ($format == "JPG") or ($format == "PNG") or ($format == "JPEG")) {
            move_uploaded_file($foto_tmp, '../file/'.$foto);
            $tambah=mysqli_query($koneksi, "insert into kandidat values ('','$nama','$no_urut','$foto','$visi','$misi','0')");

            if ($tambah) {
                header("location:kandidat.php");
            } else {
                echo '<script language="javascript">alert("Gagal Input Kandidat!"); window.history.back();<script>';
            }
        } else {
            echo '<script language="javascript">alert("Format Foto Tidak Sesuai!"); window.history.back();<script>';
        }
}
?>