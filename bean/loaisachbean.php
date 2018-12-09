<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loaisachbean
 *
 * @author Admin
 */
class loaisachbean {
    var $maLoaiSach;
    var $tenLoaiSach;
    
    function __construct($maLoaiSach, $tenLoaiSach) {
        $this->maLoaiSach = $maLoaiSach;
        $this->tenLoaiSach = $tenLoaiSach;
    }
}
