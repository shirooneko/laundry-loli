<?php 
require 'config.php';
$sql = "DELETE FROM paket WHERE id_paket = " . $_GET['id'];
$exe = mysqli_query($conn,$sql);

if($exe){
    header('location: paket.php');
}else {
    echo "gagal Hapus";
}
 ?>

