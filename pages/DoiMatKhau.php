<?php
if (isset($_POST["butDoiMK"])) {
    $khbo = new khachhangbo();
    $khbo->getKhachHang();
    $maKhachHang = $_SESSION["user"];
    $matKhauCu = $_POST["txtMKC"];
    $matKhauMoi = $_POST["txtMKM"];
    $xacNhanMatKhau = $_POST["txtXNMK"];
    if ($khbo->getKH($maKhachHang)->matKhau===$matKhauCu) {
        if ($matKhauMoi === $xacNhanMatKhau) {
            $khbo->doiMatKhau($maKhachHang, $matKhauMoi);
            echo 'Đổi Mật Khẩu Thành Công';
        } else {
            echo "Mật Khẩu Không Khớp";
        }
    } else {
        echo 'Mật Khẩu Cũ Không Đúng';
    }
}
?>

<form method="POST" action="index.php?p=8">
    <h2>Đăng ký tài khoản</h2>
    <div class="form-group" style="width: 300px">
            <label>Mật Khẩu Cũ: </label>
            <input type="password" name="txtMKC">
    </div>
    <div class="form-group" style="width: 300px">
            <label>Mật Khẩu Mới: </label>
            <input type="password" name="txtMKM">
    </div>
    <div class="form-group" style="width: 300px">
            <label>Xác Nhận Mật Khẩu: </label>
            <input type="password" name="txtXNMK">
    </div>
    <div class="form-group" style="width: 300px">
        <input type="submit" name="butDoiMK" value="Đổi Mật Khẩu" class="btn btn-info">       
    </div>    
</form>

