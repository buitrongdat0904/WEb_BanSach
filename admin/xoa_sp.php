<?php
require_once '../connect.php';
$idsp=$_GET['idsp'];
$sql="delete from sanpham WHERE id_sp='$idsp'";
$q=mysqli_query($conn, $sql);
if ($q){
    header('location: ds_sp.php');
}else{echo "<script>alert('Lỗi')</script>";}

?>