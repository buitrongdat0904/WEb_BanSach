<?php
require_once("connect.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <script src="https://kit.fontawesome.com/a3babc9596.js" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <title>Đăng Ký</title>
</head>
<style>
    .a{
        width: 400px;
        height: auto;
        border: 1px solid slategrey;
        border-radius: 12px;
        background: #c4e3f3;
    }
    .a .b{
        width: 132px;
        height: 124px;
        border-radius: 50%;
        border: 1px solid;
        margin: 0 auto;
        background: antiquewhite;
        margin-top: 17px;
    }
    .b img{
        margin-left: -1px;
        margin-top: -7px;
        width: 133px;
        height: 130px;
        border-radius: 50%;
    }
    .a form{
        margin-top: 15px;
    }
    .a form .form-group label{
        font-family: 'Lobster';
        letter-spacing: 3px;
        font-size: 21px;
        color: #269abc;
    }
    input#submit {
        padding: 7px;
        width: 80%;
        border-radius: 10px;
        border: none;
        bottom: 10px;
        cursor: pointer;
        background: linear-gradient(to right, #2b669a, #5bc0de);
        margin-bottom: 12px;
        margin-left: 10%;
    }
    input#submit:hover{

        background: linear-gradient(to right, #fc466b, #3f5efb);
    }
</style>
<body>
<div class="container a">
    <div class="b">
        <img src="images/book.gif" alt="book gif">
    </div>
    <form action="#" method="post">
        <div class="form-group">
            <label for="tk">Tên tài khoản</label>
            <input type="text" class="form-control" id="tk" name="acc" placeholder="nguyenvana">
        </div>
        <div class="form-group">
            <label for="mk">Mật Khẩu</label>
            <input type="password" class="form-control" id="mk" name="pass" placeholder="VD: 12345678">
        </div>
        <div class="form-group">
            <label for="remk">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="remk" name="re_pass" placeholder="VD: 12345678">
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="VD: 0989999999">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="VD: abc@gmail.com">
        </div>
        <div class="form-group">
            <label for="dc">Địa Chỉ</label>
            <input type="text" class="form-control" id="dc" name="address" placeholder="Hà Nội">
        </div>

        <div>
            <input id="submit" type="submit" name="ok" value="Đăng Ký">
        </div>

    </form>
</div>
<?php
if (isset($_POST['ok'])){
    $acc=$_POST['acc'];
    $pass=$_POST['pass'];
    $re_pass=$_POST['re_pass'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    if (!empty($acc) && !empty($pass) && !empty($re_pass) && !empty($phone) &&
        !empty($email) && !empty($address)){
        $ktra_user_pass = "[\W]";
        if (!preg_match($ktra_user_pass,$acc) && !preg_match($ktra_user_pass,$pass)) {
            if ($pass === $re_pass) {
                $sql_Check = "select tai_khoan from nguoi_dung WHERE tai_khoan = '$acc'";
                $query = mysqli_query($conn, $sql_Check);
                if (mysqli_num_rows($query) < 1) {
                    $sql = "insert into nguoi_dung(tai_khoan, mat_khau, sdt, email, dia_chi)
                            VALUES ('$acc', '$pass', '$phone', '$email', '$address')";
                    $q = mysqli_query($conn, $sql);
                    if ($q) {
                        echo "<script>alert('Thành công')</script>";
                        header('location:login.php');
                    } else {
                        echo "<script>alert('Không Thành công')</script>";
                    }
                } else {
                    echo "<script>alert('Tài khoản đã tồn tại')</script>";
                }
            }else{
                echo "<script>alert('Mật khẩu chưa trùng khớp')</script>";
            }
        }else{
            echo "<script>alert('Tài khoản hoặc mật khẩu không được chứa ký tự đặt biệt')</script>";
        }
    }else{
        echo "<script>alert('Không được để trống')</script>";
    }
}
?>
</body>
</html>/