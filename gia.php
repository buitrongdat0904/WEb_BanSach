<?php
$s = "select * from danhmuc_sp WHERE id_dm ORDER BY id_dm ASC limit 8 ";
$q=mysqli_query($conn,$s);
while ($n=mysqli_fetch_array($q))
{
    ?>
    <li><a href="xemthem_sp.php?ID=<?php echo $n['id_dm']; ?>">
            <?php echo $n['ten_dm']; ?></a></li>
<?php } ?>