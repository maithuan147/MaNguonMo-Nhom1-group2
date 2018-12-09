<?php

class itemInCart {
    var $maSach;
    var $tenSach;
    var $donGia;
    var $soLuongMua;
    var $image;
    var $thanhTien;
    
    function __construct($maSach, $tenSach, $donGia, $soLuongMua, $image) {
        $this->maSach = $maSach;
        $this->tenSach = $tenSach;
        $this->donGia = $donGia;
        $this->soLuongMua = $soLuongMua;
        $this->image = $image;
        $this->thanhTien = $soLuongMua*$donGia;
    }
}
class Cart{
        var $lsItemInCart;
        public function __construct() {
            $this->lsItemInCart=array();
        }
        function addItemInCart($itemInCart){
            foreach ($this->lsItemInCart as $item){
                if($item->maSach==$itemInCart->maSach){
                    $item->soLuongMua+=$itemInCart->soLuongMua;
                    return;
                }
            }
            $this->lsItemInCart[]=$itemInCart;
        }
        function  deleteItemInCart($maSach){
            foreach($this->lsItemInCart as $key=>$value){
                if($value->maSach==$maSach){
                    unset($this->lsItemInCart[$key]);
                    return;
                }
            }
        }
}
