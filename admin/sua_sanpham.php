<?php
session_start();
require_once '../connect.php';
$idsp=$_GET['idsp'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sửa Thông Tin Sản Phẩm</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../public/JS/js1.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/CSS/2.css">
</head>
<style>
    .row{
        margin: 0;
    }
    table tr td{
        padding: 5px 11px;
    }
    table tr .aa{
        width: 400px;
    }
    table tr td input{
        width: 380px;
    }
</style>
<body>
<?php
if(isset($_POST['ok']))
{
    $tensp=$_POST['tensp'];
    $img_name = $_FILES['anhsp']['name'];
    $img_tmpname = $_FILES['anhsp']['tmp_name'];
    $theloai = $_POST['theloai'];
    $giasp = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    $nxb = $_POST['nxb'];
    $tacgia = $_POST['tacgia'];

    $ghichu=$_POST['ghichu'];


    if(empty($tensp) || empty($tacgia) || empty($nxb) ||
        empty($giasp) || empty($theloai) || empty($soluong)
    )
    {
        echo "<script>alert('Nhập đầy đủ thông tin sản phẩm')</script>";
    }
    else
    {
        move_uploaded_file($img_tmpname, '../images/'.$img_name);
        $sql1= "update sanpham set ten_sp ='$tensp', anh_sp='$img_name', id_dm='$theloai', gia_sp='$giasp',
                                    so_luong='$soluong', nxb='$nxb',tac_gia='$tacgia',
                                     ghi_chu='$ghichu'
                         WHERE id_sp=$idsp";
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
                  <span style='color: #c4e3f3;float: right;margin-left: 5px;'>"
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
    <h3 align="center" style="color: #ee0b0b"><b><i>Sửa Thông Tin Sản Phẩm</i></b></h3>
    <form method="post" enctype="multipart/form-data">
        <table class="text-left table-bordered table-responsive" style="margin: auto">
            <?php
            $sql = "SELECT * FROM sanpham WHERE id_sp ='$idsp'";
            $q = mysqli_query($conn,$sql);
            $num = mysqli_fetch_array($q)
            ?>
            <tr>
                <td>Tên Sản Phẩm</td>
                <td class="aa">
                    <input type="text" name="tensp" value="<?php echo $num['ten_sp']; ?>">
                </td>
            </tr>
            <tr>
                <td>Ảnh Sản Phẩm</td>
                <td><img src="../images/<?php echo $num['anh_sp'] ?>" style="width: 50px; height: 50px" alt=""></td>
            </tr>
            <tr>
                <td>Ảnh Mới</td>
                <td class="aa">
                    <input type="file" name="anhsp">
                </td>
            </tr>
            <tr>
                <td>Giá Sản Phẩm</td>
                <td class="aa">
                    <input type="text" name="giasp" value="<?php echo $num['gia_sp']; ?>">
                </td>
            </tr>
            <tr>
                <td>Thể loại</td>
                <td class="aa">
                    <select name="theloai">
                        <?php
//                        $sql0="select * from danhmuc_sp, sanpham WHERE sanpham.id_dm=danhmuc_sp.id_dm and id_sp='$idsp'";
                        $sql0="select * from danhmuc_sp";
                        $query=mysqli_query($conn, $sql0);
                        while($num1 = mysqli_fetch_array($query))
                        {
                            ?>
                            <option value="<?php echo $num1['id_dm']; ?>">
                                <?php echo $num1['ten_dm']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td class="aa">
                    <input type="text" name="soluong" value="<?php echo $num['so_luong']; ?>">
                </td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td class="aa">
                    <input type="text" name="tacgia" value="<?php echo $num['tac_gia']; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhà xuất bản</td>
                <td class="aa">
                    <input type="text" name="nxb" value="<?php echo $num['nxb']; ?>">
                </td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td class="aa">
                    <textarea cols="45"row = "8" name="ghichu" value="<?php echo $num['ghi_chu']; ?>"></textarea>

                </td>
            </tr>


            <tr>
                <td>
                    <a href="ds_sp.php">
                        <button type="button" class="btn btn-success">Trở về</button></a>
                </td>
                <td class="text-center">
                    <input type="submit" name="ok" value="Cập nhật" class="btn btn-primary">
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