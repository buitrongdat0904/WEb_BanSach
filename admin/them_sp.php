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
    $tensp=$_POST['tensp'];
    $img_name = $_FILES['anhsp']['name'];
    $img_tmpname = $_FILES['anhsp']['tmp_name'];
    $tacgia = $_POST['tacgia'];
    $nxb = $_POST['nxb'];
    $img_ct2 = $_FILES['anhct2']['name'];
    $img_tmp2 = $_FILES['anhct2']['tmp_name'];
    $giasp = $_POST['giasp'];
    $theloai = $_POST['theloai'];
    $soluong = $_POST['soluong'];
    $ghichu=$_POST['ghichu'];


    if(empty($tensp) || empty($tacgia) || empty($nxb) ||
        empty($giasp) || empty($theloai) || empty($soluong) ||empty($ghichu)


        )
    {
        echo "<script>alert('Nhập đầy đủ thông tin sản phẩm')</script>";
    }
    else
    {
        move_uploaded_file($img_tmpname, '../images/'.$img_name);
        $sql1= "insert into sanpham(ten_sp, anh_sp, anh_ct2, id_dm,tac_gia,nxb, gia_sp, so_luong, ghi_chu)
                         VALUES ('$tensp', '$img_name', '$img_ct2','$theloai', '$tacgia', '$nxb', '$giasp',
                                  '$soluong', '$ghichu')";
        $query1=mysqli_query($conn, $sql1);
        if($query1)
        {
            header('location: ds_sp.php');
        }
        else
        {
            echo "<script>alert('Không Thành Công')</script>";
        }
    }
}
?>

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

    <div class="row">
        <h3 align="center" style="color: #ee0b0b"><b><i>Thêm sản phẩm</i></b></h3>
        <form method="post" enctype="multipart/form-data">
            <table class="text-left" style="margin: auto">
                <tr>
                    <td>Tên Sản Phẩm</td>
                    <td>
                        <input type="text" name="tensp">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh Sản Phẩm</td>
                    <td>
                        <input type="file" name="anhsp">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh chi tiết 2</td>
                    <td>
                        <input type="file" name="anhct2">
                    </td>
                </tr>
                <tr>
                    <td>Giá Sản Phẩm</td>
                    <td>
                        <input type="text" name="giasp">
                    </td>
                </tr>
                <tr>
                    <td>Nhà xuất bản</td>
                    <td>
                        <input type="text" name="nxb">
                    </td>
                </tr>
                <tr>
                    <td>Thể loại</td>
                    <td>
                        <select name="theloai">
                            <?php
                            $sql0='select * from danhmuc_sp';
                            $query=mysqli_query($conn, $sql0);
                            while($num = mysqli_fetch_array($query))
                            {
                                ?>
                                <option value="<?php echo $num['id_dm']; ?>">
                                    <?php echo $num['ten_dm']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="text" name="soluong">
                    </td>
                </tr>
                <tr>
                    <td>Tác giả</td>
                    <td>
                        <input type="text" name="tacgia">
                    </td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td>
                        <textarea cols="55" row="90" name="ghichu"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" name="ok" value="Thêm" class="btn btn-primary">
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
    <div class="footer"></div>

</body>
</html>
<script src="../public/JS/js.js"></script>