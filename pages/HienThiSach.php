<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["txtSearch"])){
        $ten=$_POST["txtSearch"];
        $sachbo = new sachbo();
        $sachbo->getSach();
        $listSach=$sachbo->getSachTheoTen($ten);        
    }
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "GET"&&isset($_GET["ml"]))
{
    $maLoai = $_GET["ml"];
    $sachbo = new sachbo();
    $sachbo->getSach();
    $listSach=$sachbo->getSachTheoMa($maLoai);
}
 else {
     $sachbo = new sachbo();
     $listSach=$sachbo->getSach();
}
?>
<?php if($listSach!==null){?>
<style>
    .bor-image{
    margin: 15px;
    border: 3px solid #094f5f;
    padding: 20px;
    border-radius: 30px;
    }
</style>
<div class="row">
        <?php
        foreach ($listSach as $value) {
            ?>
    <div class="col-lg-4" style="height: 500px">
        <div class="bor-image">
                <img src="<?php echo $value->image ?>" width="200px" height="200px" border-radius="30px"><br>
        <h5>Tên sách: <?php echo $value->tenSach ; ?></h5>
        <p >Hiện còn: <?php  echo $value->soLuong ;?> quyển </p>
        <p >Giá: <?php echo $value->gia ; ?> </p>
        <p >NXB: <?php echo $value->nhaXuatBan ; ?> </p>
        <p >Tác giả: <?php echo $value->tacGia ; ?> </p>
            
        <a href="index.php?p=3&masach=<?php echo $value->maSach?>"><img src="image/buynow.jpg"><br></a>
        </div>
    </div>
        <?php
        }
        ?>
</div>
<?php
}
?>