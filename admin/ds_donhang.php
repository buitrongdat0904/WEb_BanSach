<?php
session_start();
require_once '../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Đơn Hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../public/JS/js1.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/CSS/2.css">
</head>
<style>
    .row{
        margin: 0;
    }
</style>
<body>
    <div class="row">
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
                  <span class='glyphicon glyphicon-log-out'></span>Log Out: ".""
                .$_SESSION['account']."</span></a>";
        }else
        {
            ?>
            <a href="../register.php" class="regis_log">Sign Up</a>
            <a class="regis_log" href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <?php } ?>

    </div>
</div>

    <div class="row">
        <h3 align="center" style="color: #ee0b0b"><b><i>Quản lý đơn hàng</i></b></h3>
        <div class="table-responsive container">
            <table class="table table-responsive table-bordered">

                <tr>
                    <th>STT</th>
                    <th>ID HD</th>
                    <th>Khách hàng</th>
                    <th>Ngày Lập Hóa Đơn</th>
                    <th>Tổng Tiền</th>
                    <th>Tùy Chọn</th>
                </tr>
                <?php
                $stt = 1;
                $sql="select * from don_dh,nguoi_dung WHERE don_dh.id_nd = nguoi_dung.id_nd";
                $query=mysqli_query($conn, $sql);
                while ($num = mysqli_fetch_array($query))
                {
                    ?>
                    <tr style="height: 30px; text-align: center;">
                        <th><?php echo $stt; ?></th>
                        <th><?php echo $num['id_hd']; ?></th>
                        <td><?php echo $num['tai_khoan']; ?></td>
                        <td><?php echo $num['ngay_lap']; ?></td>
                        <td><?php echo $num['tong_gia']; ?></td>
                        <th>
                            <a href="chitiet_donhang.php?iddh=<?php echo $num['id_hd']; ?>">
                                <i class="glyphicon glyphicon-list-alt"></i></a> <br>
                            <a href="xoa_donhang.php?iddh=<?php echo $num['id_hd']; ?>"
                               onClick ="if(confirm('Bạn chắc chắn muốn xóa')) return true;
                           else return false;"><i class="glyphicon glyphicon-trash"></i></a>
                        </th>
                    </tr>
                    <?php $stt += 1; } ?>
            </table>
        </div>
    </div>
    <!----------Nut home-------->
    <div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
         title="Trở lên đầu trang">
        <span class="glyphicon glyphicon-circle-arrow-up text-primary"></span>
    </div>
</body>
</html>
<script src="../public/JS/js.js"></script>