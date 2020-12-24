<?php
session_start();
require_once ('../connect.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản Lý </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../public/JS/js1.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/CSS/2.css">
</head>
<body>
<!--------------------------------->

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

<!--------------------------------->

<div class="content">
    <h3 align="center" style="color: #5bc0de"><b><i>Quản lý khách hàng</i></b></h3>
    <div class="table-responsive">
        <table class="table-responsive table-bordered table" style="text-align: center">
            <tr style="font-weight: bold">
                <td>STT</td>
                <td>Tên người dùng</td>
                <td>Số điện thoại</td>
                <td>Email</td>
                <td>Mật khẩu</td>
                <td>Địa chỉ</td>
                <td>Tình trạng</td>
            </tr>
            <?php
            $stt = 1;
            $sql = "SELECT * FROM nguoi_dung WHERE id_nd > 1";
            $q = mysqli_query($conn,$sql);
            while ($num = mysqli_fetch_array($q))
            {
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $num['tai_khoan']; ?></td>
                    <td><?php echo $num['sdt']; ?></td>
                    <td><?php echo $num['email']; ?></td>
                    <td><?php echo $num['mat_khau']; ?></td>
                    <td><?php echo $num['dia_chi']; ?></td>
                    <td colspan="2">
                        <a href="sua_nguoidung.php?iduser=<?php echo $num['id_nd']; ?>">
                            <i class="glyphicon glyphicon-edit"></i></a>
                        - <a href="xoa_nguoidung.php?iduser=<?php echo $num['id_nd']; ?>"
                             onClick ="if(confirm('Bạn chắc chắn muốn xóa')) return true;
                             else return false;"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php $stt += 1; } ?>
        </table>
    </div>
</div>

<!--------------------------------->
<!----------Nut home-------->
<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="glyphicon glyphicon-circle-arrow-up text-primary"></span>
</div>
<!--    <div class="footer"></div>-->

<!--------------------------------->
</body>
</html>
<script src="../public/JS/js.js"></script>