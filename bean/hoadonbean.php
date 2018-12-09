<?php

class hoadonbean {
    var $maHoaDon;
    var $maKhachHang;
    var $maSach;
    var $soLuongMua;
    var $thanhTien;
    var $ngayMua;
    
    function __construct($maHoaDon, $maKhachHang, $maSach, $soLuongMua, $thanhTien, $ngayMua) {
        $this->maHoaDon = $maHoaDon;
        $this->maKhachHang = $maKhachHang;
        $this->maSach = $maSach;
        $this->soLuongMua = $soLuongMua;
        $this->thanhTien = $thanhTien;
        $this->ngayMua = $ngayMua;
    }

}
