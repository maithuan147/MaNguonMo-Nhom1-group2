<?php
$lbo = new loaisachbo();
$lsLoai = $lbo->getLoaiSach();
$sachbo = new sachbo();
?>
<?php
// Ấn định  dung lượng file ảnh upload
define("MAX_SIZE", "100");

// hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
// file này có phải là file hình hay không .
function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

//This variable is used as a flag. The value is initialized with 0 (meaning no
// error  found)
//and it will be changed to 1 if an errro occures.
//If the error occures the file will not be uploaded.
$errors = 0;
//checks if the form has been submitted
if (isset($_POST['butThem'])) {
// lấy tên file upload
    $image = $_FILES['image']['name'];
// Nếu nó không rỗng
    if ($image) {
// Lấy tên gốc của file
        $filename = stripslashes($_FILES['image']['name']);
//Lấy phần mở rộng của file
        $extension = getExtension($filename);
        $extension = strtolower($extension);
// Nếu nó không phải là file hình thì sẽ thông báo lỗi
        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
// xuất lỗi ra màn hình
            echo '<h1>Đây không phải là file hình!</h1>';
            $errors = 1;
        } else {
//Lấy dung lượng của file upload
            $size = filesize($_FILES['image']['tmp_name']);
            if ($size > MAX_SIZE * 1024) {
                echo '<h1>Vượt quá dung lượng cho phép!</h1>';
                $errors = 1;
            }

// đặt tên mới cho file hình up lên
            $image_name = time() . '.' . $extension;
// gán thêm cho file này đường dẫn
            $newname = "image/" . $image_name;
            copy($_FILES['image']['tmp_name'], $newname);
        }
    }
}

if (isset($_POST['butThem']) && !$errors) {
    $tenSach = $_POST["txtTenSach"];
    $maLoaiSach = $_POST["txtLoaiSach"];
    $soLuong = $_POST["txtSL"];
    $gia = $_POST["txtGia"];
    $nhaXuatBan = $_POST["txtNXB"];
    $tacGia = $_POST["txtTG"];
    $sachbo->themSach($tenSach, $maLoaiSach, $soLuong, $gia, $nhaXuatBan, $tacGia, $newname);
    echo "<h1>File hình đã được Upload thành công </h1>";
}
?>
<form method="POST" action="quanLy.php?p=9" enctype="multipart/form-data">
    <div class="form-group" style="width: 500px">
    Tên Sách<input type="text" class="form-control" name="txtTenSach" required><br>
    Số Lượng <input type="number" class="form-control" name="txtSL" required value="0"><br>
    Giá <input type="number" class="form-control" name="txtGia" required value="0"><br>
    Nhà Xuất Bản <input type="text" class="form-control" name="txtNXB" required><br>
    Tác Giả <input type="text" class="form-control" name="txtTG" required><br>
    Ảnh <input type="file" class="form-control-file" name="image"><br>
    Loại Sách<select class="form-control"  name="txtLoaiSach">
<?php foreach ($lsLoai as $value) { ?>
            <option value="<?php echo $value->maLoaiSach ?>"><?php echo $value->tenLoaiSach ?></option>
<?php } ?>
    </select>
    <button type="submit" class="btn btn-info"  name="butThem">Thêm <span class="glyphicon">&#x2b;</span></button>
    </div>
</form>