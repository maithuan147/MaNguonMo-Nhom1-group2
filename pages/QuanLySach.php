<?php
$sachbo = new sachbo();
$sachbo->getSach();
$lsSach = array();
if (isset($_GET["ml"])) {
    $maLoai = $_GET["ml"];
    $lsSach = $sachbo->getSachTheoMa($maLoai);
} else {
    if (isset($_POST["txtSearch"])) {
        $ten = $_POST["txtSearch"];
        $lsSach = $sachbo->getSachTheoTen($ten);
    } else {
        $lsSach = $sachbo->getSach();
    }
}
?>

<?php
if (isset($_GET["xoasach"])) {
    $maSach = $_GET["xoasach"];
    if ($sachbo->xoaSach($maSach) == 1) {
        unlink($_GET["filename"]);
        header("Location: quanLy.php?p=6");
    } else {
         echo "Không thể xóa sach đã tồn tại trong các hóa đơn";
    }
}
?>
<?php
if (isset($_POST["butSua"])) {
    $maSach = $_POST["txtMaSach"];
    $tenSach = $_POST["txtTenSach"];
    $maLoaiSach = $_POST["txtLoaiSach"];
    $soLuong = $_POST["txtSoLuong"];
    $gia = $_POST["txtGia"];
    $nhaXuatBan = $_POST["txtNXB"];
    $tacGia = $_POST["txtTG"];
    $sachbo->suaSach($maSach, $tenSach, $maLoaiSach, $soLuong, $gia, $nhaXuatBan, $tacGia);
    header("Location: quanLy.php?p=6");
}
if(!isset($_GET["sualk"]))
{
    ?>
    <button class="btn btn-info"><a href="quanLy.php?p=9">Thêm <span class="glyphicon">&#x2b;</span></a></button><hr>
    <?php
}
?>
<?php
if (isset($_GET["suasach"])) {
    $ms = $_GET["suasach"];
    $sach = $sachbo->getSachTheoMaSach($ms);
    $lbo = new loaisachbo();
    $lsLoai = $lbo->getLoaiSach();
    ?>
        <form method="POST" action="quanLy.php?p=6">
        Mã Sách<input type="text" class="form-control" readonly name="txtMaSach" value="<?php echo $sach->maSach; ?>"><br>
        Tên Sách<input type="text" class="form-control" name="txtTenSach" required value="<?php echo $sach->tenSach; ?>"><br>    
        Số Lượng<input type="text" class="form-control" name="txtSoLuong" required value="<?php echo $sach->soLuong; ?>"><br>
        Giá<input type="text" class="form-control" name="txtGia" value="<?php echo $sach->gia; ?>"><br>
        Nhà Xuất Bản<input type="text" class="form-control" name="txtNXB" required value="<?php echo $sach->nhaXuatBan; ?>"><br>
        Tác Giả<input type="text" class="form-control" name="txtTG" required value="<?php echo $sach->tacGia; ?>"><br>
        Loại Sách<select name="txtLoaiSach">
    <?php
    foreach ($lsLoai as $value) {
        if ($sach->maLoaiSach === $value->maLoaiSach) {
            ?>
                    <option selected="<?php $value->maLoaiSach ?>" value="<?php echo $value->maLoaiSach ?>"><?php echo $value->tenLoaiSach ?></option>
                    <?php
                    continue;
                }
                ?>
                <option value="<?php echo $value->maLoaiSach ?>"><?php echo $value->tenLoaiSach ?></option>
            <?php } ?>
        </select>
        <br><button type="submit" class="btn btn-info" name="butSua">Sửa <span class="glyphicon">&#xe136;</span></button>
    </form>
    <?php
} else {
    ?>
    <style>
    .bor-image{
    margin: 15px;
    border: 3px solid #094f5f;
    padding: 20px;
    border-radius: 30px;
    }
    </style>
    <div class="row">
    <?php
    foreach ($lsSach as $value) {
        ?>
            <div class="col-lg-4" style="height: 500px">
            <div class="bor-image">
                <img src="<?php echo $value->image ?>" width="200px" height="200px" border-radius="30px"><br>
                <h5>Tên sách: <?php echo $value->tenSach ; ?></h5>
                <p >Hiện còn: <?php  echo $value->soLuong ;?> quyển </p>
                <p >Giá: <?php echo $value->gia ; ?> </p>
                <p >NXB: <?php echo $value->nhaXuatBan ; ?> </p>
                <p >Tác giả: <?php echo $value->tacGia ; ?> </p>
                <button class="btn btn-info"><a href="quanLy.php?p=6&suasach=<?php echo $value->maSach ?>">Sửa <span class="glyphicon">&#xe136;</span></a></button>
                <button class="btn btn-info"><a href="quanLy.php?p=6&xoasach=<?php echo $value->maSach ?>&filename=<?php echo $value->image ?>">Xóa <span class="glyphicon">&#xe020;</span></a></button>
            </div>
            </div>
        <?php
    }
    ?>
    </div>
    <?php } ?>