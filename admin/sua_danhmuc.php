<?php
session_start();
require_once '../connect.php';
$iddm=$_GET['idtl'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cập Nhật Danh Mục</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../public/JS/js1.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/CSS/2.css">
</head>
<style>
    .row{margin: 0}
</style>
<body>

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

<div class="row">
    <h3 align="center" style="color: #ee0b0b"><b><i>Cập nhật danh mục</i></b></h3>
    <form action="#" method="post">
        <div class="table-responsive">
            <table class="table-responsive table-bordered text-center" style="margin: auto">
                <?php
                $sql="select * from danhmuc_sp WHERE id_dm='$iddm'";
                $query = mysqli_query($conn, $sql);
                $num = mysqli_fetch_array($query)
                ?>
                <tr>
                    <td style="padding: 15px"><b>Tên thể loại</b></td>
                    <td style="width: 277px;"><input style="width: 252px;" type="text" name="danhmuc" value="<?php echo $num['ten_dm']; ?>"></td>
                </tr>
                <tr>
                    <td style="padding: 10px"><a href="ds_danhmuc.php">
                            <button type="button" class="btn btn-danger">Quay lại</button>
                        </a></td>
                    <td>
                        <button type="submit" style="width: 206px" name="ok" class="btn btn-warning">Cập nhật</button>
                    </td></tr>
            </table>
        </div>
    </form>
</div>

<?php
if (isset($_POST['ok'])){
    $tendm=$_POST['danhmuc'];
    if (!empty($tendm)){
        $sql1="update danhmuc_sp set ten_dm='$tendm' WHERE id_dm='$iddm'";
        $query1=mysqli_query($conn, $sql1);
        if ($query1){
            header('location: ds_danhmuc.php');
        }else{
            echo "<script>alert('Cập nhật không thành công!!!')</script>";
        }
    }else{
        echo "<script>alert('Tên danh mục không được để trống!!!')</script>";
    }
}
?>
</body>
</html>