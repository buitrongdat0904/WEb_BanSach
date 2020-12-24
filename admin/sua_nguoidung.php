<?php
session_start();
require_once ('../connect.php');
$iduser=$_GET['iduser'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sửa Thông Tin Người Dùng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../public/JS/js1.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/CSS/2.css">
</head>
<style>
    table tr td input{
        width: 260px;
        font-weight: 100;
    }
    table tr .aa{
        width: 300px;
    }
    table tr{
        height: 50px;
    }
    table tr td{
        width: 156px;
        text-align: center;
        font-weight: bold;
    }
</style>
<body>
<!--------------------------------->

<div class="row" style="margin: 0">
    <div class="topnav" id="myTopnav">
        <a href="../index.php" class="active">Home Shopping</a>
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

<!--------------------------------->

<div class="content">
    <h3 align="center" style="color: #ee0b0b"><b><i>Sửa thông tin người dùng</i></b></h3>
    <form action="#" method="post">
        <div class="table-responsive">
            <table class="table-responsive table-bordered" style="margin: auto">

                <?php
                $sql = "SELECT * FROM nguoi_dung WHERE id_nd ='$iduser'";
                $q = mysqli_query($conn,$sql);
                $num = mysqli_fetch_array($q)
                ?>
                <tr>
                    <td>Tên người dùng</td>
                    <td class="aa"><input type="text" name="ten_tk" value="<?php echo $num['tai_khoan']; ?>" id=""></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td class="aa"><input type="text" name="mk" value="<?php echo $num['mat_khau']; ?>" id=""></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td class="aa"><input type="tel" name="sdt" value="<?php echo $num['sdt']; ?>" id=""></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td class="aa"><input type="email" name="email" value="<?php echo $num['email']; ?>" id=""></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td class="aa"><input type="text" name="diachi" value="<?php echo $num['dia_chi']; ?>" id=""></td>
                </tr>
                <tr><td colspan="2">
                        <a href="indexadmin.php"><button type="button" class="btn-primary btn"
                                style="float: left;margin-left: 24px;width: 130px;font-size: 18px;">Quay lại</button></a>
                        <button type="submit" name="ok" class="btn btn-success"
                                style="float: right;margin-right: 24px;width: 130px;font-size: 18px;">Cập Nhật</button>
                    </td></tr>
            </table>
        </div>
    </form>
</div>
<?php
    if (isset($_POST['ok'])){
        $taikhoan=$_POST['ten_tk'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $pass=$_POST['mk'];
        if (!empty($taikhoan) && !empty($pass))
        {
            $sql1="update nguoi_dung set tai_khoan='$taikhoan', mat_khau='$pass',
                            sdt='$sdt', email='$email', dia_chi='$diachi' WHERE id_nd='$iduser'";
            $query=mysqli_query($conn, $sql1);
            if ($query){
                header('location: indexadmin.php');
            }else{
                echo "<script>alert('Cập nhật không thành công !')</script>";
            }
        }else{
            echo "<script>alert('Tài khoản và Mật khẩu không được bỏ trống !')</script>";
        }
    }
?>
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