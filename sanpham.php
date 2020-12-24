<?php
require_once 'connect.php';
session_start();
//echo $_SESSION['account'];
//echo $_SESSION['id_nd'];
if (isset($_GET['idsp'])){
    $idsanpham=$_GET['idsp'];
}
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
    <link rel="stylesheet" href="public/CSS/style1.css">
    <link rel="stylesheet" href="public/CSS/sanpham1.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <title>Sản Phẩm</title>
</head>
<script>

</script>
<body>
<!---------Header------->

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

<!---------Body---------->
<div class="container">
    <!---------------Menu------------------>
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
<!--////////-->
    <?php
    $sql="select * from sanpham,danhmuc_sp WHERE id_sp = $idsanpham and sanpham.id_dm=danhmuc_sp.id_dm";
    $query=mysqli_query($conn,$sql);
    $num=mysqli_fetch_array($query);
//    echo "<div class=\"alert alert-success alert-dismissible\" id=\"myAlert\">
//    <a href=\"#\" class=\"close\">&times;</a>
//    <strong>Success!</strong> Thêm sản phẩm vào giỏ hàng thành công
//  </div>";
    if (isset($_POST['ok']))
    {
        if (isset($_SESSION['account']))
        {
            $soluong= (int)$_POST['soluong'];
            $idnd=$_SESSION['id_nd'];
            $idsp=$num['id_sp'];
            if ($soluong > $num['so_luong'] || $soluong < 1)
            {
                echo "<script>alert('Số lượng không hợp lệ')</script>";

            }
            else
            {
                $sql1="select * from gio_hang WHERE id_nd='$idnd' AND id_sp='$idsp'";
                $query1=mysqli_query($conn, $sql1);
                if (mysqli_num_rows($query1) != 0)
                {
                    $num1=mysqli_fetch_array($query1);
                    $idgh=$num1['id_giohang'];
                    $sql2="update gio_hang set so_luong=so_luong + '$soluong'
                            WHERE id_giohang='$idgh'";
                    $query2=mysqli_query($conn, $sql2);
                    if ($query2) return true;
                        else return false;
                    if ($query2)
                    {echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";}
                    else {echo "<script>alert('Lỗi1')</script>";}
                }
                else
                {
                    $sql3="insert into gio_hang(id_nd, id_sp, so_luong) 
                                  VALUES ('$idnd','$idsp', '$soluong')";
                    $query3=mysqli_query($conn, $sql3);
                    if ($query3)
                    {echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";}
                    else {echo "<script>alert('Lỗi2')</script>";}
                }
            }
        }
        else
        {
            echo "<script>alert('Bạn phải đăng nhập!!!')</script>";
        }
    }
    ?>
    <!---------------Danh sach san pham------------------>
    <div class="row">
        <form action="#" method="post">
            <div class="container">
                <div class="card">
                    <div class="container-fliud">
                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-1"><img src="images/<?php echo $num['anh_sp']; ?>" alt="<?php echo $num['ten_sp'];?>">
                                    </div>

                                </div>

                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title"><?php echo $num['ten_sp'];?></h3>
                                <p style="font-weight: bold;font-size: 17px">Mô tả sản phẩm</p>

                                <p><i class="fas fa-check"></i><span>Tên sản phẩm:</span> <b><?php echo $num['ten_sp'];?></b></p>
                                <p><i class="fas fa-check"></i><span>Tên thể loại:</span> <b><?php echo $num['ten_dm'];?></b></p>
                                <p><i class="fas fa-check"></i><span>Tác giả: </span> <?php echo $num['tac_gia'];?></p>
                                <p><i class="fas fa-check"></i><span>Nhà xuất bản:</span> <?php echo $num['nxb'];?></p>
                                <p><i class="fas fa-check"></i><span>Giới thiệu tác phẩm:</span> <?php echo $num['ghi_chu'];?></p>
                                <p><b>Giao Hàng:</b></p>

                                <p>- Thời gian làm việc từ 8h30 - 18h30 từ thứ 2- CN</p>
                                <br>
                                <p><i class="fas fa-check"></i><span>Giá tiền:</span></p>
                                <br>
                                 <p class="gia"><?php echo number_format($num['gia_sp'],0,',','.'); ?> <span><sup>đ</sup></span></p>
                                <br>
                                <p>
                                    <label for="solsp">Số Lượng: </label>
                                    <input type="number" name="soluong" id="solsp" value="1" style="width: 120px">
                                    <span style="margin-left: 88px"><b>Tình Trạng:</b> <i><?php echo $num['so_luong'];?></i></span>
                                </p>
                                <div class="action">
                                     <button class="add-to-cart btn btn-primary" id="numpp" name="ok" type="submit">CHO VÀO GIỎ</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

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
