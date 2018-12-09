<?php
include './dao/loaisachdao.php';
class loaisachbo {
    var $listlsach;
    public function __construct() {
        $this->listlsach=array();
    }
    public function getLoaiSach() {
        $lsdao = new loaiSachdao();
        $this->listlsach=$lsdao->getLoaiSach();
        return $this->listlsach;
    }
    public function xoaLoaiSach($maLoaiSach)
    {
        $lsdao = new loaiSachdao();
        $lsdao->xoaLoaiSach($maLoaiSach);
    }
    public function suaLoaiSach ($maLoaiSach,$tenLoaiSach)
    {
        $lsdao = new loaiSachdao();
        $lsdao->suaLoaiSach($maLoaiSach, $tenLoaiSach);
    }
    public function themLoaiSach($tenLoaiSach) {
        $lsdao = new loaiSachdao();
        $lsdao->themLoaiSach($tenLoaiSach);
    }
}
