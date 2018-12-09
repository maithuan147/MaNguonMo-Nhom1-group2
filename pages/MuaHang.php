<?php
   $masach=$_GET["masach"];
   $sachbo = new sachbo();
   $sachbo->getSach();
   $sach=$sachbo->getSachTheoMaSach($masach);
?>
<table class="table table-bordered">
    <tr class="active">
        <th style="text-align: center">Sách</th>
        <th style="text-align: center">Tên Sách</th>
        <th style="text-align: center">Giá</th>
        <th style="text-align: center">Số lượng</th>
        <th style="text-align: center">Thêm vào giỏ</th>
    </tr>
    <tr>
        <form action="index.php?action=1&masach=<?php echo $sach->maSach?>&tensach=<?php echo $sach->tenSach?>&sl=<?php?>&gia=<?php echo $sach->gia?>&img=<?php echo $sach->image?>" method="POST">
        	
	            <td><img  width="200px" src="./<?php echo $sach->image?>"></td>
	            <td><?php echo $sach->tenSach?></td>
	            <td><?php echo $sach->gia?> VNĐ</td>    
	            <td><input type="number" value="1" name="txtSL"></td>
	            <td><button type="submit" name="butThem"><image src="image/giohang.png" width="200px"></button></td>
                    
        </form>  
    </tr>
    <li class="list-group-item"><a href=<?php echo("index.php")?>>
        Tiếp tục mua hàng
        </a></li>
</table>