<?php if (!isset($_SESSION["user"])) { ?>
	
    <form method="POST" action="#">
    	<h2>Đăng nhập tài khoản</h2>
        <div class="form-group" style="width: 300px">
            <label>Tài Khoản:</label>
            <input type="text" class="form-control" name="txtTK">
         </div>
         <div class="form-group" style="width: 300px">
         	<label>Mật Khẩu:</label>
            <input type="password" class="form-control" name="txtMK">
         </div>  
        <div class="form-group" style="width: 300px">
        	<input type="submit" name="butDN" value="Đăng Nhập" class="btn btn-info">        
            <a href="index.php?p=4" class="btn btn-success">Đăng Ký</a>
        </div>  
            
       
    </form>
	
<?php
} else {
    header("Location: index.php");
}
?>
<?php
if (isset($_POST["txtTK"]) && isset($_POST["txtMK"])) {
    $tk = $_POST["txtTK"];
    $mk = $_POST["txtMK"];
    $khbo = new khachhangbo();
    $khbo->getKhachHang();
    $kh = $khbo->kiemTraDN($tk, $mk);
    if ($kh == null) {
        echo("Tài Khoản Hoặc Mật Khẩu Không Đúng!");
    } else {
        $_SESSION["user"] = $tk;
        $_SESSION["userName"] = $kh->hoTen;
        $_SESSION["quyen"] = $kh->quyen;
        header("Location: index.php");
    }
}
?>
