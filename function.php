<?php
require_once 'connect.php';
global $conn;
function chitiethd($id, $idsp, $soluong, $thanhtien, $hoten, $sdt, $email, $diachi, $ghichu){
    global $conn;
    $sql="insert into chitiet_hd(id_hd, id_sp, so_luong, don_gia, hoten_kh, sdt, email, noi_nhan, ghi_chu) VALUES 
                      ($id, $idsp, $soluong, $thanhtien, $hoten, $sdt, $email, $diachi, $ghichu)";
    $query=mysqli_query($conn, $sql);
    if ($query) return true;
        else return false;

}
?>