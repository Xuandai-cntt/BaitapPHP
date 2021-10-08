<?php

$mathang = array
  (
  array("A001","Sữa tắm XMen","Chai 50ml",50),
  array("A002","Dầu gội đầu Lifeboy","Chai 50ml",20),
  array("B001","Dầu ăn Cái Lân","Chai 1 lít",10),
  array("B002","Đường cát","kg",15),
  array("C001","Chén sứ Minh Long","Bộ 10 cái",2)
  );
?>
<!DOCTYPE html>

<html>
<head>
<link type="text/css" rel="stylesheet" href="Bai5.css">
</head>

<body>
 <h2>Mặt Hàng</h2>
<table>
 <thead>
 <tr>
 <th>
 <?php
      $arr=array();
      $mamh="";
      $tenmh="";
      $donvi="";
      $soluong=0;
   if(isset($_POST["submit"])){
      $mamh=$_POST["mamh"];
      $arr[0]= $mamh;
      $tenmh=$_POST["tenmh"];
      $arr[1]=$tenmh;
      $donvi=$_POST["donvi"];
      $arr[2]=$donvi; 
      $soluong=$_POST["soluong"];
      $arr[3]= $soluong;
     
   }
   array_push($mathang,$arr);
?>
 <?php
 echo "Mã mặt hàng". "</th>\n<th>";
 echo "Tên mặt hàng". "</th>\n<th>";
 echo "Đơn vị tính". "</th>\n<th>";
 echo "Số lượng". "</th>";
 ?>
 </tr>
</th>
 </thead>
 <?php
    for ($row = 0; $row <count($mathang); $row++)
    {
    echo "<tr>\n";
    foreach ($mathang[$row] as $val)
    {
    echo "<td>$val</td>\n";
    }
    echo "</tr>\n";
    }
 ?>
 </table>
 <form action="" method="post">
    <div class="form-group">
        <p>Mã mặt hàng <input type="text" name="mamh" value="<?php echo $mamh?>" /></p>
        <p>Tên mặt hàng  <input type="text" name="tenmh" value="<?php echo $tenmh ?>"/></p>
        <p>Đơn vị tính  <input type="text" name="donvi" value="<?php echo $donvi ?>"/></p>
        <p>Số lượng  <input type="text" name="soluong" value="<?php echo $soluong ?>"/></p>
    </div>
      <div class="col-lg-12 loginbttm">
       <div class="col-lg-6 login-btm login-button">
        <input type="submit" name="submit" class="btn btn-outline-primary" value="Nhập Hàng" />
      </div>
      </div>
</form>
</body>
</html>
 