<?php 
require 'config.php';
$query = "DELETE detail_transaksi, transaksi FROM detail_transaksi JOIN transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi AND detail_transaksi.transaksi_id = transaksi.id_transaksi";
$exe = mysqli_query($conn,$query);

if($exe){
    header('location: transaksi.php');
} else {
    echo "data gagal dihapis";
}
 ?>