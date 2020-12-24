<?php
require_once '../connect.php';
$iddm=$_GET['iddm'];
$sql="delete from danhmuc_sp WHERE id_dm='$iddm'";
$q=mysqli_query($conn, $sql);
if ($q){
    header('location: ds_danhmuc.php');
}else{echo "<script>alert('Lỗi')</script>";}

?>