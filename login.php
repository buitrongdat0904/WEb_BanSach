<?php
require_once ('connect.php');
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
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <script src=""></script>
    <title>login</title>
    <style>
        .a{
            width: 400px;
            height: 500px;
            border: 1px solid slategrey;
            border-radius: 12px;
            background: ghostwhite;
        }
        .a .b{
            width: 132px;
            height: 124px;
            border-radius: 50%;
            border: 1px solid;
            margin: 0 auto;
            background: antiquewhite;
            margin-top: 16px;
        }
        .b img{
            margin-left: 15px;
            margin-top: 10px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .a form{
            margin-top: 15px;
        }
        .a form .form-group label{
            font-family: 'Arial';
            letter-spacing: 3px;
            font-size: 21px;
            color: #5bc0de;
        }
        .c button{
            width: 300px;
            background: linear-gradient(to right, #2b669a, #5bc0de);

            font-weight: bolder;
            border-radius: 19px;
            margin-left: 34px;
        }
    </style>
</head>
<body>
<div class="container a">
    <div class="b">
        <img src="images/book.gif" alt="">
    </div>
    <form method="post">
        <div class="form-group">
            <label for="tk">Tài khoản</label>
            <input type="text" class="form-control" id="tk" name="taikhoan" placeholder="Tên tài khoản">
        </div>
        <div class="form-group">
            <label for="mk">Mật khẩu</label>
            <input type="password" class="form-control" id="mk" name="matkhau" placeholder="Mật khẩu">
        </div>
        <div class="form-group" style="height: 17px;">
            <a href="#">Quên mật khẩu?</a>
        </div>
        <div class="c">
            <button type="submit" class="btn btn-warning" name="dangnhap">Đăng Nhập</button>
        </div>
        <div class="text-center" style="margin-top: 10px">
            <p>Or</p>
            <i>Bạn chưa có tài khoản? </i><span><a href="register.php">Tạo tài khoản</a></span>
        </div>
    </form>
</div>
<?php
if (isset($_POST['dangnhap'])){
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $sql = "select * from nguoi_dung WHERE tai_khoan='$taikhoan' and mat_khau='$matkhau'";
    $thucthi=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($thucthi);
    $qr=mysqli_fetch_array($thucthi);
    if($num != 0){
        $ad = $qr['id_nd'];
        if ($ad == 1){
            $_SESSION['account']=$taikhoan;
            $_SESSION['id_nd']=$ad;
            $_SESSION['']= $taikhoan and $matkhau;
            header('location:admin/indexadmin.php');
        }else{
            $_SESSION['account']=$taikhoan;
            $_SESSION['matkhau']=$matkhau;
            $_SESSION['id_nd']=$ad;
            $_SESSION['']= $taikhoan and $matkhau;
            header('location:index.php');
        }
    }else{
        echo "<script>alert('Ban nhap sai ten Tài Khoản hoặc Mật Khẩu')</script>";
    }
}
?>
</body>
</html>