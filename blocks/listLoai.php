<?php
    $loaibo = new loaisachbo();
    $lis=$loaibo->getLoaiSach();
    ?>

<ul class="list-group">
    <?php
    foreach ($lis as $key=>$value) {?>
    <li class="list-group-item"><a href=<?php echo("index.php?p=1&ml="."$value->maLoaiSach")?>><?php echo $value->tenLoaiSach?></a></li>
<?php    
}
?>
</ul>

