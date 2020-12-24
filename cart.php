<?php
require_once 'connect.php';
session_start();
if (!isset($_SESSION['account']))
{
    header('location: index.php');
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
    <link rel="stylesheet" href="public/CSS/1.css">
    <title>Cart</title>
</head>
<body>
<!---------Header------->
<!--<div class="row" style="background: #000000;width: 100%;margin: auto">-->


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
    </div>

<!---------Body---------->
<div class="container">
    <div class="row">
        <h4><a href="order.php">Danh sách đơn hàng</a></h4>
        <form action="#" method="post">
            <div class="table-responsive">
                <table class="table table-responsive text-center table-bordered">
                    <tr>
                        <td><b>Sản Phẩm</b></td>
                        <td><b>Tên sản phẩm</b></td>
                        <td><b>Giá</b></td>
                        <td><b>Số lượng</b></td>
                        <td><b>Thành tiền</b></td>
                        <td><b>Đơn vị giao hàng</b></td>
                        <td><b>Tùy chọn</b></td>
                    </tr>
                    <?php
                    $tongtien = 0;
                    $idnd=$_SESSION['id_nd'];
                    $sql1="select id_giohang, gio_hang.id_sp, anh_sp, ten_sp, gia_sp, gio_hang.so_luong as sl_gh,
                            (gia_sp * gio_hang.so_luong) as thanhtien from gio_hang,sanpham
                            WHERE id_nd='$idnd' AND gio_hang.id_sp=sanpham.id_sp";
                    $query1=mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($query1) != 0)
                    {

                        while ($num1=mysqli_fetch_array($query1))
                        {
                            $arr=array((int)$num1['id_sp'],(int)$num1['sl_gh'],(int)$num1['thanhtien']);
                    ?>
                            <?php
                                $idsp=$num1['id_sp'];
                                $sluong=$num1['sl_gh'];
                                $gia=$num1['gia_sp'];

                            ?>
                            <tr>
                                <td><img src="images/<?php echo $num1['anh_sp'];?>" style="width: 100px; height: 100px" alt=""></td>
                                <td><?php echo $num1['ten_sp'];?></td>
                                <td><?php echo $num1['gia_sp'];?></td>
                                <td><?php echo $num1['sl_gh'];?></td>
                                <td><?php echo number_format($num1['thanhtien']);?></td>
                                <td>
                                    <select name="nvgh">
                                        <?php
                                        $sql="select * from nhanvien_gh";
                                        $query=mysqli_query($conn, $sql);
                                        while ($num=mysqli_fetch_array($query))
                                        {
                                            ?>
                                            <option value="<?php echo $num['id_nvgh'];?>"><?php echo $num['ten_nvgh'];?></option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td><a href="xoacart.php?idgh=<?php echo $num1['id_giohang'];?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </a></td>
                            </tr>

                    <?php
                            $tongtien += $num1['thanhtien'];
                             }
                         }
                    ?>
                </table>
            </div>
            <div class="container">
                <h5><b>THÔNG TIN KHÁCH HÀNG</b></h5>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <b>Họ và tên</b> <br>
                    <input type="text" name="hoten" id="" placeholder="Họ và tên (*)"
                           style="width: 100%;border-radius: 3px;border: 1px solid #999;padding-left: 5px">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <b>Số điện thoại</b> <br>
                    <input type="tel" name="sdt" id="" placeholder="Số điện thoại (*)"
                           style="width: 100%;border-radius: 3px;border: 1px solid #999;padding-left: 5px">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <b>Email</b> <br>
                    <input type="email" name="email" id="" placeholder="Email (*)"
                           style="width: 100%;border-radius: 3px;border: 1px solid #999;padding-left: 5px">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <b>Địa chỉ giao hàng</b> <br>
                    <input type="text" name="diachi" id="" placeholder="Địa chỉ giao hàng (*)"
                           style="width: 100%;border-radius: 3px;border: 1px solid #999;padding-left: 5px">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <b>Ghi chú</b> <br>
                    <textarea name="ghichu" id="" cols="30" rows="10"
                              style="width: 100%;border-radius: 3px;border: 1px solid #999;padding-left: 5px"></textarea>
                </div>
            </div>
            <br>
            <div class="container">
                <b style="font-size: 15px;">TỔNG GIÁ TRỊ THANH TOÁN:</b>
                <b style="color: red; margin-left: 10px;font-size: 22px"><?php echo number_format($tongtien); ?></b>
            </div>
            <br>
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 73px">
                <button style="width: 230px;" type="submit" name="ok" class="btn btn-success">Đặt Mua</button>
            </div>
        </form>
    </div>
</div>

<?php
    if (isset($_POST['ok']))
    {
        $nvgh=$_POST['nvgh'];
        $hoten=$_POST['hoten'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $ghichu=$_POST['ghichu'];
        if (!empty($arr)){
            if (!empty($hoten) || !empty($sdt) || !empty($email) || !empty($diachi))
            {
                $sql2="insert into don_dh(id_nd, id_nvgh, ngay_lap, tong_gia) 
                          VALUES ('$idnd', '$nvgh',now(), '$tongtien') ";
                $query2=mysqli_query($conn, $sql2);
                if ($query2){
//
                    $idmh=mysqli_insert_id($conn);

                        $sql3="insert into chitiet_hd(id_hd, id_sp, so_luong, don_gia, hoten_kh, sdt, email, noi_nhan, ghi_chu)
                                VALUES ('$idmh','$idsp', '$sluong', '$gia', '$hoten', '$sdt', '$email', '$diachi', '$ghichu') ";
                        $query3=mysqli_query($conn, $sql3);
//                    }

                    if ($query3)
                    {

                            $sql4 = "update sanpham set so_luong=so_luong - '$sluong'
                                    WHERE id_sp='$idsp'";
                            $query4 = mysqli_query($conn, $sql4);
                            if ($query4){
                                $sql5="delete from gio_hang WHERE id_nd='$idnd'";
                                $query5=mysqli_query($conn, $sql5);
                                if ($query5){
                                    echo "<script>alert('Đặt hàng thành công')</script>";
                                }else{echo "<script>alert('Đặt hàng thất bại')</script>";}
                            }else{echo "<script>alert('Lỗi tru sp')</script>";}
                        //}
                    }else{echo "<script>alert('Lỗi them ctdh')</script>";}

                }else{echo "<script>alert('Lỗi them dh')</script>";}
            }else{
                echo "<script>alert('Không được để trống các thông tin có dâu (*)')</script>";
            }
        }else{
            echo "<script>alert('Bạn chưa chọn sản phẩm nào vào giỏ hàng')</script>";
        }
    }
?>


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
