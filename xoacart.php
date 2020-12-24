<?php
 require_once 'connect.php';
 $id = $_GET['idgh'];
 $sql="delete from gio_hang WHERE id_giohang = '$id'";
 $q = mysqli_query($conn, $sql);
 if ($q){
     header('location: cart.php');
 }else{
     echo "<script>alert('Lỗi')</script>";
 }
?>