<form method="POST" action="index.php?p=4">
    <div class="col-md-5">
    	<h2>Đăng ký tài khoản</h2>
        <label><b>Tài Khoản</b></label>
        <input type="text" class="form-control" placeholder="Enter Username" name="txtTK" required><br>

        <label><b>Mật Khẩu</b></label>
        <input type="password" class="form-control" placeholder="Enter Password" name="txtMK" required><br>
        <label><b>Họ Tên</b></label>
        <input type="text" class="form-control" placeholder="Enter Name" name="txtName" required><br>
        <label><b>Địa Chỉ</b></label>
        <input type="text" class="form-control" placeholder="Enter Address" name="txtDC" required><br>
        <label><b>Số Điện Thoại</b></label>
        <input type="text" class="form-control" placeholder="Enter NumberPhone" name="txtSDT" required><br>
        <label><b>Email</b></label>
        <input type="email" class="form-control" placeholder="Enter Email" name="txtEmail" required><br>
        <input type="submit" class="form-control btn btn-success" value="Đăng Ký" name="butDK">
    </div>
</form>
<?php
if (isset($_POST["butDK"])) {
    $maTK = $_POST["txtTK"];
    $khbo = new khachhangbo();
    $khbo->getKhachHang();
    if ($khbo->getKH($maTK) == NULL) {
        $matKhau = $_POST["txtMK"];
        $hoTen = $_POST["txtName"];
        $diaChi = $_POST["txtDC"];
        $soDienThoai = $_POST["txtSDT"];
        $email = $_POST["txtEmail"];
        $khbo->dangKy($maTK, $matKhau, $hoTen, $diaChi, $soDienThoai, $email);
        echo 'Đăng Ký Thành Công';
    } else {
        echo "Tài Khoản Đã Trùng";
    }
}
?>
