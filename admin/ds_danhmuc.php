<?php
session_start();
require_once '../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Danh Mục</title>
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
    <h3 align="center" style="color: #ee0b0b"><b><i>Quản lý danh mục</i></b></h3>
    <p style="text-align: center; padding: 10px 0px"><a href="them_danhmuc.php">Thêm thể loại</a></p>
    <div class="table-responsive">
        <table class="table table-responsive table-bordered text-center">

            <tr style="font-weight: bold">
                <td>STT</td>
                <td>ID DM</td>
                <td>Tên thể loại</td>
                <td>
                    Tình trạng
                </td>
            </tr>
            <?php
            $stt = 1;
            $sql='select * from danhmuc_sp';
            $query = mysqli_query($conn, $sql);
            while ($num = mysqli_fetch_array($query))
            {
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $num['id_dm']; ?></td>
                    <td><?php echo $num['ten_dm']; ?></td>
                    <td colspan="2">
                        <a href="sua_danhmuc.php?idtl=<?php echo $num['id_dm']; ?>">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        - <a href="xoa_danhmuc.php?iddm=<?php echo $num['id_dm']; ?>"
                             onClick ="if(confirm('Bạn chắc chắn muốn xóa')) return true; else return false;">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>
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
<!--    <div class="footer"></div>-->

</body>
</html>
<script src="../public/JS/js.js"></script>