<?php

class sachbean {
    var $maSach;
    var $tenSach;
    var $maLoaiSach;
    var $soLuong;
    var $gia;
    var $nhaXuatBan;
    var $tacGia;
    var $image;
    
    function __construct($maSach, $tenSach, $maLoaiSach, $soLuong, $gia, $nhaXuatBan, $tacGia, $image) {
        $this->maSach = $maSach;
        $this->tenSach = $tenSach;
        $this->maLoaiSach = $maLoaiSach;
        $this->soLuong = $soLuong;
        $this->gia = $gia;
        $this->nhaXuatBan = $nhaXuatBan;
        $this->tacGia = $tacGia;
        $this->image = $image;
    }

}
