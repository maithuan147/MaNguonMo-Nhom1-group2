<?php

include './dao/hoadondao.php';
class hoadonbo {
    var $listhd;
    public function __construct() {
        $this->listhd=array();
    }
    public function getHoaDon(){
        $hddao= new hoadondao();
        $this->listhd=$hddao->getHoadon();
    }
}
