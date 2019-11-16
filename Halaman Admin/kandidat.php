<?php 
session_start(); 
if (!isset($_SESSION['username'])){ 
 header("location:index.php"); } 
 ?>
<!DOCTYPE html> 
<html> 
<head>  
   <title>Data Kandidat</title> 
</head> 
<body>  
   <h1 align="center">Data Kandidat</h1>  
   <table align="center" border="1"> 
   <tr>    
      <td>No</td> 
      <td>Nama</td>    
      <td>No Urut</td>    
      <td>Foto</td>    
      <td>Visi</td>    
      <td>Misi</td>    
      <td>Voting</td>    
      <td colspan="2"><a href="kandidat-tambah.php">Tambah</a></td>   
      </tr>   
      <?php   
      $no=1;   
      include('koneksi.php');   
      $kandidat=mysqli_query($koneksi,"select * from kandidat");   
      while ($data=mysqli_fetch_assoc($kandidat)){   
         ?>   
         <tr>    
            <td><?php echo $no++; ?></td>    
            <td><?php echo $data['nama']; ?></td>    
            <td><?php echo $data['no_urut']; ?></td>    
            <td><img src="../file/<?php echo $data['foto']; ?>" 
               height="100px"></td>    <td><?php echo $data['visi']; 
               ?>
                  
               </td>    
               <td><?php echo $data['misi']; ?></td>    
               <td><?php echo $data['voting']; ?></td>    
               <td><a href="kandidat-edit.php?id_kandidat=<?php echo $data['id_kandidat']; ?>">Edit</a></td>    
               <td><a href="kandidat-delete.php?id_kandidat=<?php echo $data['id_kandidat']; ?>&foto=<?php echo $data['foto']; ?>">Delete</a></td>   </tr>   <?php   }   ?>  </table> </body> </html