<?php
session_start();
require_once '../connect.php';
$id = $_GET['iddh'];
//echo $id;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chi Tiết Đơn Đặt Hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../public/JS/js1.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/CSS/2.css">
</head>
<body>
<div class="row" style="margin: 0">
    <div class="topnav" id="myTopnav">
        <a href="../index.php" class="active">NXB</a>
        <a href="indexadmin.php">Khách hàng</a>
        <a href="ds_sp.php">Sản Phẩm</a>
        <a href="ds_danhmuc.php">Danh Mục</a>
        <a href="ds_donhang.php">Đơn hàng</a>

        <a href="javascript:void(0);"
           style="font-size:17px;"
           class="icon" onclick="myFunction()">&#9776;</a>

        <?php
        if (isset($_SESSION['account']))
        {
            echo "<a class='regis_log' href=../Logout.php tyle='float: right'>
                  <span class='glyphicon glyphicon-log-out'></span>Log Out: "."
                  <span style='color: #c4e3f3;float: right;margin-left: 5px;'>"
                .$_SESSION['account']."</span></a>";
        }else
        {
            ?>
            <a href="../register.php" class="regis_log">Sign Up</a>
            <a class="regis_log" href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <?php } ?>

    </div>
</div>
    <div class="row" style="margin: 0">
        <h3 align="center" style="color: #c4e3f3"><b><i>Chi tiết đơn hàng</i></b></h3>
        <div class="table-responsive">
            <table class="table table-responsive table-bordered text-center">
                <tr style="font-weight: bold">
                    <td>STT</td>
                    <td>ID HD</td>
                    <td>Tên người nhận</td>
                    <td>Tên sách</td>
                    <td>Số lượng</td>
                    <td>Đơn giá</td>
                    <td>Số điện thoại</td>
                    <td>Email</td>
                    <td>Nơi Nhận Hàng</td>
                    <td>Ghi Chú</td>
                </tr>
                <?php
                $stt = 1;
                $tongtien = 0;
                $sql = "SELECT *, chitiet_hd.so_luong as SL
              FROM chitiet_hd,sanpham 
              WHERE chitiet_hd.id_sp = sanpham.id_sp
              and chitiet_hd.id_hd = $id";
                $query = mysqli_query($conn,$sql);

                while ($num = mysqli_fetch_array($query))
                {
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $num['id_hd']; ?></td>
                        <td><?php echo $num['hoten_kh']; ?></td>
                        <td><?php echo $num['ten_sp']; ?></td>
                        <td><?php echo $num['SL']; ?></td>
                        <td><?php echo $num['don_gia']; ?> đ</td>
                        <td><?php echo $num['sdt']; ?></td>
                        <td><?php echo $num['email']; ?></td>
                        <td><?php echo $num['noi_nhan']; ?></td>
                        <td><?php echo $num['ghi_chu']; ?></td>
                    </tr>

                    <?php $stt += 1; $tongtien = $num['don_gia'] * $num['SL']; } ?>
                <tr>
                    <td colspan="10"><b>Tổng tiền: </b> <span style="color: blue"><?php echo $tongtien; ?> đ</span></td>
                </tr>
            </table>
        </div>
        <p style="text-align: center;"><a href="ds_donhang.php">Quay lại</a></p>
    </div>
<!----------Nut home-------->
<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="glyphicon glyphicon-circle-arrow-up text-primary"></span>
</div>
<!--    <div class="footer"></div>-->

</body>
</html>
<script src="../public/JS/js.js"></script>