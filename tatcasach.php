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

    <title>Tất cả sản ph</title>
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
            <a href="../register.php" class="regis_log">Sign Up</a>
            <a class="regis_log" href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <?php } ?>

    </div>
</div>
<div class="row">

    <div class="table-responsive">
        <input type="submit" class="button" name="insert" value="insert" />
        <input type="submit" class="button" name="select" value="select" />
        <table class="table table-bordered text-center table-responsive">


            <?php
            $stt = 1;
            $gg= 40;
            $sql='select * from sanpham ORDER BY gia_sp ASC;';

            $query=mysqli_query($conn, $sql);
            while ($num=mysqli_fetch_array($query))
            {
                ?>



                <div class="col-md-3 col-sm-4 sp">
                    <div class="col-md-3 col-sm-6 sp">
                        <div class="product-grid">
                            <div class="book1">
                                <a href="sanpham.php?idsp=<?php echo $num['id_sp']; ?>"><img src="images/<?php echo $num['anh_sp']; ?>" width="270px" height="364px"></a>
                                <div class="product-content">
                                    <i   class="title"><a href="sanpham.php?idsp=<?php echo $num['id_sp']; ?>">
                                            <?php echo $num['ten_sp'];?>
                                        </a></i>

                                    <div class="price"><?php echo number_format($num['gia_sp'],0,',','.');?> VNĐ</div>
                                    <div class="price prica" style="color: #761c19;">Giá mới: <?php echo number_format($num['gia_sp']- $num['gia_sp']*$gg/100,0,',','.');?> VNĐ</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                </tr>
                <?php $stt += 1; } ?>
        </table>

        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <script>
            $(function(){
                $('p').click(function(){
                    var clicked = $('span').click();
                    if(clicked){$('span').css('color','red');}
                });
            });
        </script>
        </head>

        <body>
        <p>Click</p>
        <span>Thành phần span</span>
    </div>

</div>
<!----------Nut home-------->
<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="glyphicon glyphicon-circle-arrow-up text-primary"></span>
</div>
<!--    -->
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