<?php

include './dao/khachhangdao.php';
class khachhangbo {
    var $listKH;
    public function __construct() {
        $this->listKH=array();
    }
    public function getKhachHang(){
        $khdao= new khachhangdao();
        $this->listKH=$khdao->getKhachHang();
    }
    public function kiemTraDN($tk,$mk)
    {
        foreach($this->listKH as $value)
        {
            if($value->maKhachHang===$tk&&$value->matKhau==$mk)
            {
                return $value;
            }
        }
        return null;
    }
    public function getKH($maKhachHang) {
        foreach($this->listKH as $value)
        {
            if($value->maKhachHang===$maKhachHang)
            {
                return $value;
            }
        }
        return null;
    }
    public function dangKy($maKhachHang, $matKhau, $hoTen, $diaChi, $soDienThoai, $email)
    {
        $khdao= new khachhangdao();
        $khdao->dangKy($maKhachHang, $matKhau, $hoTen, $diaChi, $soDienThoai, $email);
    }
    public function capNhat($maKhachHang, $hoTen, $diaChi, $soDienThoai, $email)
    {
         $khdao= new khachhangdao();
         $khdao->capNhat($maKhachHang, $hoTen, $diaChi, $soDienThoai, $email);
    }
    public function doiMatKhau($maKhachHang,$matKhauMoi){
        $khdao= new khachhangdao();
        $khdao->doiMatKhau($maKhachHang, $matKhauMoi);
    }
}
