<?php
global $conn;
$conn = mysqli_connect('localhost','root','','csdl_bansach') or die("connect");
$thucthi=mysqli_query($conn,'set names "utf8"');
