<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Cửa Hàng Sách</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <?php if(!isset($_SESSION["user"]))
      {?>
      <li><a href="index.php?p=2">Đăng Nhập</a></li> 
      <?php
      } 
      else 
      {
          ?>
      <li><a>Xin Chào: <?php echo $_SESSION["userName"]?></a></li>
      <li><a href="index.php?dx=1">Đăng Xuất</a></li>
      <?php
      
      }
      ?>
      
    </ul>
      <form class="navbar-form navbar-left" method="POST" action="quanLy.php?p=6">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="txtSearch">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
      
  </div>
</nav>
