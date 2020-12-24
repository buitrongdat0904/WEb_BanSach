<?php
session_start();
require_once '../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Sản Phẩm</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../public/JS/js1.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/CSS/2.css">
    <style>
        .row .table tr td img{
            width: 100px;
        }
        .row{
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="row">
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
        <h3 align="center" style="color: #ee0b0b"><b><i>Quản lý Sản Phẩm</i></b></h3>
        <p style="text-align: center; padding: 10px 0px"><a href="them_sp.php">Thêm sản phẩm</a></p>
        <div class="table-responsive">
            <table class="table table-bordered text-center table-responsive">

                <tr style="font-weight: bold">
                    <td>STT</td>
                    <td>ID</td>
                    <td>Thể Loại</td>
                    <td>Tên Sản Phẩm</td>
                    <td>Ảnh Sản Phẩm</td>
                    <td>Giá Sản Phẩm</td>
                    <td>Số Lượng</td>
                    <td>Nxb</td>
                    <td>Tên tác giả</td>
                    <td>Ghi chú</td>

                </tr>
                <?php
                $stt = 1;
                $sql='select * from sanpham';
                $query=mysqli_query($conn, $sql);
                while ($num=mysqli_fetch_array($query))
                {
                    ?>
                    <tr style="height: 30px;">
                        <td><?php echo $stt; ?></td>
                        <td><?php echo  $num['id_sp'];?></td>
                        <td><?php echo $num['id_dm'];?></td>
                        <td><?php echo $num['ten_sp']; ?></td>
                        <td style="padding: 0px 10px">
                            <img src="../images/<?php echo $num['anh_sp']; ?>" width="150px" >
                        </td>
                        <td><?php echo $num['gia_sp']; ?></td>
                        <td><?php echo $num['so_luong']; ?></td>
                        <td><?php echo $num['nxb']; ?></td>
                        <td><?php echo $num['tac_gia']; ?></td>
                        <td><?php echo $num['ghi_chu']; ?></td>
                        <td colspan="2">
                            <a href="sua_sanpham.php?idsp=<?php echo $num['id_sp']; ?>">
                                <i class="glyphicon glyphicon-edit"></i></a><br>
                            <a href="xoa_sp.php?idsp=<?php echo $num['id_sp']; ?>"
                               onClick ="if(confirm('Bạn chắc chắn muốn xóa'))
                               return true; else return false;"><i class="glyphicon glyphicon-trash"></i></a>
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
<!--    -->
    <div class="footer"></div>

</body>
</html>
<script src="../public/JS/js.js"></script>