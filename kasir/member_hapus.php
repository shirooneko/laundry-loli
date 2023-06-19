<?php 
require 'config.php';
$sql = "DELETE FROM member WHERE id_member = " . base64_decode($_GET['id']);
$exe = mysqli_query($conn,$sql);

if($exe){
    header('location: member.php');
} else {
    echo "<b>GAGAL HAPUS DATA DISEBABKAN MEMBER TERHUBUNG KE TRANSAKSI<b>";
}
 ?>
