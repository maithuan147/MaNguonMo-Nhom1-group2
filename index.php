<?php
session_start();
include('./bo/loaisachbo.php');
include('./bo/sachbo.php');
include('./bo/khachhangbo.php');
include './dao/hoadondao.php';
include './dao/chitiethoadondao.php';
?>
<?php
$p;
if(!isset($_GET["p"]))
{
    $p=1;
}
if (isset($_GET["dx"]) && $_GET["dx"] == 1) {
    session_destroy();
    header("Location: index.php");
}
?>
<?php
include ('./bean/giohangbean.php');
//thêm giỏ hàng
if(isset($_GET["action"])){
    if($_GET["action"]==1&&isset($_POST["butThem"])){
    $maSach=$_GET["masach"];
    $tenSach=$_GET["tensach"];
    $donGia= $_GET["gia"];
    $soLuongMua=$_POST["txtSL"];
    if($soLuongMua<0)
    {
        $soLuongMua=0;
    }
    $image=$_GET["img"];
    
    $itemInCart= new itemInCart($maSach,$tenSach,$donGia,$soLuongMua,$image);
    $cart;
    if(isset($_SESSION["cart"]))
        $cart=unserialize($_SESSION["cart"]);
    else
        $cart= new Cart();
    $cart->addItemInCart($itemInCart);
    $_SESSION["cart"]=serialize($cart);
    $_SESSION["sl"]= count($cart->lsItemInCart);
    }
    //xóa giỏ hàng
    if($_GET["action"]==3){
        $cart=unserialize($_SESSION["cart"]);
        $maSach=$_GET["masach"];
        $cart->deleteItemInCart($maSach);
        $_SESSION["cart"]=serialize($cart);
        $_SESSION["sl"]= count($cart->lsItemInCart);
    }
    //thanh toán
    if($_GET["action"]==2 )
    {
        if(isset($_SESSION["user"])){
        $cart=unserialize($_SESSION["cart"]);
        $daMua=count($cart->lsItemInCart);
        $dt = new DateTime();
        $date= $dt->format('Y-m-d H:i:s');
        $maKhachHang=$_SESSION["user"];
        $hd= new hoadondao();
        $hd->themHD($maKhachHang, $daMua,$date);
        $maHoaDon= $hd->getMHD($date);
        $cthd= new chitiethoadondao();
        foreach ($cart->lsItemInCart as $key){
            $cthd->themCTHD($key->maSach, $key->soLuongMua, $maHoaDon);
        }
        unset($_SESSION["cart"]);
        unset($_SESSION["sl"]);
        header("Location: index.php");
        }
        else
            echo "Vui lòng đăng nhập";
    }   
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include ("blocks/navbar.php");
        ?>
        
        <div class="row">
            <div class="col-md-2">
                <div>
                    <?php
                    include ("blocks/listLoai.php");
                    ?>
                </div>
            </div>
            <div class="col-md-10">
                
                <?php
                if (isset($_GET["p"])) {
                    $p = $_GET["p"];
                }
                    switch ($p) {
                        case 1: {
                        	
                                include ("pages/HienThiSach.php");
                                break;
                            }
                        case 2: {
                                include ("pages/DangNhap.php");
                                break;
                            }
                        case 3: {
                                include ("pages/MuaHang.php");
                                break;
                            }
                            
                        case 4:{
                            include ("pages/DangKy.php");
                                break;
                        }
                        case 7:{
                             include ("pages/CapNhatThongTin.php");
                                break;
                        }
                        case 8:{
                            include ("pages/DoiMatKhau.php");
                                break;
                        }
                        case 10:{
                            include ("pages/GioHang.php");
                        break;
                    
                        }
                    }
                
                ?>
            </div>
        </div>
    </body>
</html>
