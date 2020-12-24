<?php
require_once 'connect.php';
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="public/JS/js1.js"></script>
    <link rel="stylesheet" href="public/fontawesome-free-5.12.1-web/css/all.css">
    <link rel="stylesheet" href="public/CSS/1.css">

    <title>Trang Chủ</title>
</head>
<body>
<div class="tong">
    <div class="header">
        <div class="banner-top"></div>
        <div class="thongtin">
            <div class="email">
                <a href="index.php" class="active">NXB</a>
                <a href="index.php" style="text-decoration: none; color: #F7941E;">Trang chủ</a>
                <a href="gioithieu.php">Giới Thiệu</a>
                <a href="index.php">Liên Hệ</a>
            </div>
            <div class="taikhoan">

                <?php
                if (isset($_SESSION['account']))
                {
                    echo "<a class='regis_log' href=Logout.php tyle='float: right'>
                  <span class='glyphicon glyphicon-log-out'></span>Log Out: "."
                  <span style='color: sandybrown;float: right;margin-left: 5px;'>"
                        .$_SESSION['account']."</span></a>";
                }else
                {
                    ?>
                    <a href="register.php" class="regis_log">Sign Up</a>
                    <a class="regis_log" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="menu-banner">
        <div class="menu">
            <ul>
                <li class="h3">Thể Loại</li>
                <?php
                $s = "select * from danhmuc_sp WHERE id_dm ORDER BY id_dm ASC limit 8 ";
                $q=mysqli_query($conn,$s);
                while ($n=mysqli_fetch_array($q))
                {
                    ?>
                    <li><a href="xemthem_sp.php?ID=<?php echo $n['id_dm']; ?>">
                            <?php echo $n['ten_dm']; ?></a></li>
                <?php } ?>

            </ul>
        </div>
        <div class="banner">
            <div class="search-box">
                <div class="search">
                    <form method="post" action="search.php">
                        <input type="text" name="search" placeholder="Tìm kiếm sách...">
                        <input type="submit" name="timkiem" value="Tìm kiếm">
                    </form>
                </div>
                <div class="giohang" href="cart.php" class="regis_log">
                    <a href="cart.php" class="regis_log">

                    </a>

                </div>
            </div>
            <div class="banner-main">

                <img src="images/banner.jpg" width="800px" height="369px">
            </div>
        </div>
    </div>

    <!---------------Danh sach san pham------------------>

    <table class="table table-bordered">
        <tr>
            <th>ID đơn hàng</th>
            <th>Người đặt</th>
            <th>Ngày mua</th>
            <th>Tổng tiền</th>
            <th>Tùy chọn</th>
        </tr>
        <?php
        $id = $_SESSION['id_nd'];
        $sql = "select * from don_dh, nguoi_dung WHERE don_dh.id_nd=nguoi_dung.id_nd AND don_dh.id_nd='$id'";
        $query = mysqli_query($conn, $sql);
        while ($num = mysqli_fetch_array($query))
        {
        ?>
            <tr>
                <td><?php echo $num['id_hd'];?></td>
                <td><?php echo $num['tai_khoan'];?></td>
                <td><?php echo $num['ngay_lap'];?></td>
                <td><?php echo $num['tong_gia'];?></td>
                <td><a href="order_detail.php?idddh=<?php echo $num['id_hd'];?>">Chi tiết đơn hàng</a></td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>
<!----------Nut home-------->
<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="glyphicon glyphicon-circle-arrow-up text-primary"></span>
</div>
<!---------Footer---------->
<div class="row footer">
    <div class="fot col-md-4">
        <font>VỀ NXB</font> <br>
        <a href="gioithieu.php">Giới thiệu</a> <br>
        <a href="index.php">Thanh toán</a> <br>
        <a href="#">Chăm sóc khách hàng</a> <br>


    </div>
    <div class="fot col-md-4">
        <font>CHÍNH SÁCH & HỖ TRỢ</font> <br>
        <a href="#">Hỗ trợ mua hàng trực tuyến</a> <br>
        <a href="#">Chính sách giao hàng</a> <br>
        <a href="#">Hóa đơn điện tử</a>
    </div>
    <div class="fot col-md-4">
        <font>THÔNG TIN LIÊN HỆ</font> <br>
        <i class="fas fa-map-marker-alt"></i>
        <span>Địa chỉ: 197 Trần Phú Hà Đông Hà Nội</a></span> <br>
        <i class="fas fa-mobile-alt"></i>
        <span>Điện thoại: (+84) 967448690</span> <br>
        <i class="fas fa-phone-volume"></i>
        <i class="fas fa-envelope-open-text"></i>
        <span>Email: <a href="https://www.google.com/gmail">buitrongdat0904@gmail.com</a></span>
    </div>


</div>

</body>
</html>
<script src="public/JS/js.js"></script>
