<?php

class chitiethoadondao {
    public function themCTHD($maSach,$soLuongMua,$maHoaDon){
        $conn= mysqli_connect("localhost", "root", "", "qlsach");
        mysqli_set_charset($conn, 'UTF8');
        $sql="insert into chitiethoadon(MaSach,SoLuongMua,MaHoaDon) values('$maSach','$soLuongMua','$maHoaDon')";
        $result = $conn->query($sql);
        if ($conn == null) {
            echo " conn: null";
        }
        if ($result == null) {

            echo " result: null";
        }
    }
}
