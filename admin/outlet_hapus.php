<?php 
require 'config.php';
$sql = "DELETE FROM outlet WHERE id_outlet = " . stripslashes($_GET['id']);
$exe = mysqli_query($conn,$sql);

if($exe){
    header('location: outlet.php');
}
