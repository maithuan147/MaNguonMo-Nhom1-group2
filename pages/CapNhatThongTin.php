<?php
$maKhachHang = $_SESSION["user"];
$khbo = new khachhangbo();
$khbo->getKhachHang();
$kh = $khbo->getKH($maKhachHang);
?>
<?php
if (isset($_POST["butCapNhat"])) {
    $maKhachHang = $_POST["txtMaTaiKhoan"];
    $hoTen = $_POST["txtHoTen"];
    $diaChi = $_POST["txtDiaChi"];
    $soDienThoai = $_POST["txtSDT"];
    $email = $_POST["txtEmail"];
    if (is_numeric($soDienThoai)) {
        $khbo = new khachhangbo();
        $khbo->capNhat($maKhachHang, $hoTen, $diaChi, $soDienThoai, $email);
        header("Location: index.php?p=7&tb=1");
    } else {
        echo "Số Điện Thoại Không Đúng";
    }
}
?>
<?php
    if(isset($_GET["tb"]))
    {
        if($_GET["tb"]==1)
        {
            echo "Cập Nhật Thành Công";
        }
    }
?>

<form method="POST" action="index.php?p=7" class="col-md-5">
	<h2 style="text-align:center">Cập nhật thông tin</h2>
	<div class="form-group"> 
		<label> Tài Khoản </label> 
		<input class="form-control" type="text" readonly name="txtMaTaiKhoan" value="<?php echo $maKhachHang ?>">
	</div>
    <div class="form-group"> 
		<label> Họ Tên </label> 
		 <input class="form-control" type="text" required  name="txtHoTen" value="<?php echo $kh->hoTen ?>">
	</div>
   	<div class="form-group"> 
   		<label>  Địa Chỉ</label>
   		<input class="form-control" type="text" required name="txtDiaChi" value="<?php echo $kh->diaChi ?>">
   	</div>
   	<div class="form-group">
   		<label>  Số Điện Thoại </label>
   		<input class="form-control" type="text" required name="txtSDT" value="<?php echo $kh->soDienThoai ?>">
    </div>
   <div class="form-group"> 
   	     <label>  Email</label>
   	     <input class="form-control" type="email" required name="txtEmail" value="<?php echo $kh->email ?>">
   </div>
    <div class="form-group">
    	 <input class=" btn btn-success" type="submit" name="butCapNhat" value="Cập Nhật">
    	 <a href="index.php?p=8" class="btn btn-warning">Đổi Mật Khẩu</a>
     </div>
   
</form>

