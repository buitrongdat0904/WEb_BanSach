<?php
require_once '../connect.php';

$iddh =$_GET['iddh'];
$sql= "delete from don_dh WHERE id_hd='$iddh'";
//$q =mysqli_query($conn, $sql);
//if ($q){
//    header('location: ds_donhang.php');
//}else{echo "<script>alert('Lỗi')</script>";}
//




if ($conn -> query($sql) === TRUE) {
    header('location: indexadmin.php');
} else {
    echo "<script>alert('Lỗi')</script> " . $conn->error;
}


?>

?>