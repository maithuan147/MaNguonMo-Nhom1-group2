<?php
$lbo = new loaisachbo();
$sachbo = new Sachbo();
$sachbo->getSach();
$lbo->getLoaiSach();
$listLSach = $lbo->getLoaiSach();
?>
<?php
if (isset($_GET["xoaloai"])) {
    $txtml = $_GET["xoaloai"];
    if ($sachbo->getSachTheoMa($txtml) == null) {
        $lbo->xoaLoaiSach($txtml);
        header("Location: quanLy.php?p=5");
    } else {
        echo "Loại Đang Có Sản Phẩm, Không Thể Xóa";
    }
}
?>
<?php
if (isset($_GET["sualoai"])) {
    $txtml = $_GET["sualoai"];
    ?>
    <form method="POST" action="quanLy.php?p=5&sualoai=<?php echo $txtml ?>">
        Tên Loại: <input type="text" name="txtTL">
        <input class="button" type="submit" value="Sửa">
    </form>
    <?php
    if (isset($_POST["txtTL"])) {
        $txtTL=$_POST["txtTL"];
        $lbo->suaLoaiSach($txtml, $txtTL);
        header("Location: quanLy.php?p=5");
    }
}
 else {?>
   <form method="POST" action="quanLy.php?p=5">
       Tên Loại: <input type="text" name="txtTL" required>
       <button class="btn-info" type="submit" name="butThem">Thêm <span class="glyphicon">&#x2b;</span></button>
    </form>
<?php
 }
?>
<?php
    if(isset($_POST["butThem"]))
    {
        $tenlsach=$_POST["txtTL"];
        $lbo->themLoaiSach($tenlsach);
        header("Location: quanLy.php?p=5");
        
    }
?>
<table class="table table-striped table-bordered">
    <tr>
        <th> Tên Loại Sách</th>
        <th> Chức Năng </th>
    </tr>
    <?php
    foreach ($listLSach as $value) {
        ?>
        <tr>
            <td>
                <?php echo $value->tenLoaiSach ?>
            </td>
            <td>
                <button class="btn btn-success"><a href="quanLy.php?p=5&sualoai=<?php echo $value->maLoaiSach ?>">Sửa</a></button>
                <button class="btn btn-danger"><a href="quanLy.php?p=5&xoaloai=<?php echo $value->maLoaiSach ?>">Xóa</a></button>
            </td>
        </tr>
        <?php
    }
    ?>
</table>