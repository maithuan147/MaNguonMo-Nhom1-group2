<?php

include './dao/sachdao.php';
?>
<?php

class sachbo {

    var $listSach;

    public function __construct() {
        $this->listSach = array();
    }

    public function getSach() {
        $sachdao = new sachdao();
        $this->listSach = $sachdao->getSach();
        return $this->listSach;
    }

    public function getSachTheoMa($maLoai) {
        $listSachTam = array();
        foreach ($this->listSach as $value) {
            if ($value->maLoaiSach === $maLoai) {
                $listSachTam[] = $value;
            }
        }
        return $listSachTam;
    }

    public function getSachTheoMaSach($ms) {
        foreach ($this->listSach as $value) {
            if ($value->maSach === $ms) {
                return $value;
            }
        }
        return null;
    }

    public function getSachTheoTen($ten) {
        $listTam = array();
        foreach ($this->listSach as $value) {
            if (strpos($value->tenSach, $ten) !== false) {
                $listTam[]=$value;
            }
        }
        return  $listTam;
    }
    public function suaSach($maSach,$tenSach, $maLoaiSach, $soLuong, $gia, $nhaXuatBan, $tacGia){
        $sachdao = new sachdao();
        $sachdao->suaSach($maSach, $tenSach, $maLoaiSach, $soLuong, $gia, $nhaXuatBan, $tacGia);
    }
    public function xoaSach($maSach) {
        $sachdao = new sachdao();
        return $sachdao->xoaSach($maSach);
    }
    public function themSach($tenSach, $maLoaiSach, $soLuong, $gia, $nhaXuatBan, $tacGia,$image)
    {
        $sachdao = new sachdao();
        $sachdao->themSach($tenSach, $maLoaiSach, $soLuong, $gia, $nhaXuatBan, $tacGia, $image);
    }
}
