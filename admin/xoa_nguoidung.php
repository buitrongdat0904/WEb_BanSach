<?php
require_once '../connect.php';
$idnd=$_GET['iduser'];
//$sql="delete from nguoi_dung WHERE id_nd='$idnd'";
//$q=mysqli_query($conn, $sql);
//if ($q){
//    header('location: indexadmin.php');
//}else{echo "<script>alert('Lỗi')</script>";}





$sql = "DELETE FROM nguoi_dung WHERE id_nd='$idnd'";

// Thực hiện câu truy vấn
if ($conn -> query($sql) === TRUE) {
    header('location: indexadmin.php');
} else {
    echo "Xóa thất bại: " . $conn->error;
}


?>