<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Bai4.css">
</head>
<body>
<?php
	if(isset($_POST['n']) && isset($_POST['m'])) {
        $n=$_POST['n'];
        $m=$_POST['m'];
    }
	else {
        $n=0;
        $m=0;
    }

	$ketqua="";
    $x="";
    $y="";
	if(isset($_POST['hthi'])) 
	{	//Tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
		$arr=array();
		for($i=0;$i<$n;$i++)
		{   
            for($j=0;$j<$m;$j++)
            {
            $x=rand(-1,2);
            $arr[$i][$j]=$x;
            }
        }
	}   
    // dem so phan tu le
       $count=0;
       for ($row = 0; $row<$n; $row++)
       {
           foreach ($arr[$row] as $val){
               if($val %2 !=0)
               $count++;
           }
       }
    // doi khac 0 thanh 1
    $arr1=array();
    for($i=0;$i<$n;$i++)
    {   
        for($j=0;$j<$m;$j++)
        {
            if($arr[$i][$j]!=0){
                $arr1[$i][$j]=1;
            } else $arr1[$i][$j]=$arr[$i][$j];
        }
    }
 ?>
<table class="table">
    <form class="form1" action="" method="post">
    <tr>
        <td class="nhap_ip">
            Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>
            <br><br>
            Nhập m: <input type="text" name="m" value="<?php echo $m?>"/>
            <br><br>
            <input type="submit" name="hthi" value="Hiển thị"/>
        </td>
    </tr>
    </form>
</table>
<table class="table_kq">
    <form>
    <tr>
        <h1 style="text-align: center;">Im ra mảng</h1>
    </tr>
 <?php
    for ($row = 0; $row<$n; $row++)
    {
     echo"<tr>";
        foreach ($arr[$row] as $val){
            echo "<td>$val</td>";
        }
        echo"</tr>";
    }
 ?>
    </form>
 </table>
 <table class="table_kq">
        <h1 style="text-align: center;">Số phần tử có đuôi lẻ</h1>
    <td>
        <?php echo $count." phan tu";?>
    </td>
 </table>
    <table class="table_kq">
    <form>
    <tr>
        <h1 style="text-align: center;">Mảng khi đổi khác 0->1</h1>
    </tr>
 <?php
    for ($row = 0; $row<count($arr1); $row++)
    {
     echo"<tr>";
        foreach ($arr1[$row] as $val){
            echo "<td>$val</td>";
        }
        echo"</tr>";
    }
 ?>
    </form>
 </table>
</body>
</html>