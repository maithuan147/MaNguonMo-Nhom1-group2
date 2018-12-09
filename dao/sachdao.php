<?php include './bean/sachbean.php'; ?>
<?php

class sachdao {

    //put your code here
    public function getSach() {
        $arr = array();
        //$conn=basicdao::getConnection();
        $conn = mysqli_connect("localhost", "root", "", "qlsach");
        mysqli_set_charset($conn, 'UTF8');
        $sql = "select * from sach";
        $result = $conn->query($sql);
        mysqli_set_charset($conn, 'UTF8');
        if ($conn == null) {
            echo " conn: null";
        }

        if ($result == null) {

            echo " result: null";
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sach = new sachbean($row["MaSach"], $row["TenSach"], $row["MaLoaiSach"], $row["SoLuong"], $row["Gia"], $row["NhaXuatBan"], $row["TacGia"], $row["image"]);
                $arr[] = $sach;
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $arr;
    }

    public function suaSach($maSach, $tenSach, $maLoaiSach, $soLuong, $gia, $nhaXuatBan, $tacGia) {
        $conn = mysqli_connect("localhost", "root", "", "qlsach");
        mysqli_set_charset($conn, 'UTF8');
        $sql = "UPDATE `sach` SET `TenSach`='$tenSach',`MaLoaiSach`='$maLoaiSach',`SoLuong`=$soLuong,`Gia`=$gia,`NhaXuatBan`='$nhaXuatBan',`TacGia`='$tacGia' WHERE MaSach='$maSach'";
        $conn->query($sql);
        mysqli_close($conn);
    }

    public function xoaSach($maSach) {
        $conn = mysqli_connect("localhost", "root", "", "qlsach");
        mysqli_set_charset($conn, 'UTF8');
        $sql = "select * from hoadon where MaSach='$maSach'";
        
        $result = $conn->query($sql);
        if ($result == null) {

            echo " result: null";
        }

        if ($result->num_rows > 0) {
            mysqli_free_result($result);
            mysqli_close($conn);
            return -1;
        }
        $sql = "delete from sach where MaSach='$maSach'";
        $conn->query($sql);
        mysqli_free_result($result);
        mysqli_close($conn);
        return 1;
    }
    public function themSach($tenSach, $maLoaiSach, $soLuong, $gia, $nhaXuatBan, $tacGia,$image)
    {
        $conn = mysqli_connect("localhost", "root", "", "qlsach");
        mysqli_set_charset($conn, 'UTF8');
        $sql = "INSERT INTO `sach`(`TenSach`, `MaLoaiSach`, `SoLuong`, `Gia`, `NhaXuatBan`, `TacGia`, `image`) VALUES ('$tenSach', '$maLoaiSach', $soLuong, $gia, '$nhaXuatBan', '$tacGia','$image')";
        $conn->query($sql);
        mysqli_close($conn);
    }

}
