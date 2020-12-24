<?php
session_start();
require_once '../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm Sản Phẩm</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../public/JS/js1.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/CSS/2.css">
</head>
<style>
    table tr td{
        padding-left: 10px;
    }
</style>
<body>
<?php
if(isset($_POST['ok']))
{
    $ten = $_POST['ten'];
    if(empty($ten))
    {
        echo "<script>alert('Nhập tên thể loại')</script>";
    }
    else
    {
        $sql="insert into danhmuc_sp(ten_dm) VALUES ('$ten')";
        $query=mysqli_query($conn, $sql);
        if($query) header('location: ds_danhmuc.php');
        else echo "<script>alert('Lỗi')</script>";
    }

}
?>
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
            echo "<a class='regis_log' href=../logout.php tyle='float: right'>
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
    <div class="row" style="margin: 0">
        <h3 align="center" style="color: #ee0b0b"><b><i>Thêm Danh Mục</i></b></h3>
        <form method="post">
                <table class="text-center" style="margin: auto">
                    <tr style="height: 68px;">
                        <td style="width: 122px; font-size: 22px"><b>Thể loại</b></td>
                        <td style="width: 270px;">
                            <input type="text" name="ten" style="width: 230px;height: 37px;">
                        </td>
                    </tr>
                    <tr style="height: 90px;">
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" name="ok" value="Thêm"
                            style="font-size: 19px;width: 124px;letter-spacing: 1px;font-weight: bold;">
                        </td>
                    </tr>
                </table>
        </form>
    </div>
<!----------Nut home-------->
<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="glyphicon glyphicon-circle-arrow-up text-primary"></span>
</div>
</body>
</html>
<script src="../public/JS/js.js"></script>