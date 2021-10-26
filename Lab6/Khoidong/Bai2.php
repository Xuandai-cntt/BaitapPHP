<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thong tin hang sua</title>
</head>
<body>
<?php 
// Ket noi CSDL
require("connect.php");
// Chuan bi cau truy van & Thuc thi cau truy van
$rowsPerPage=10; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page']))
{ $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset =($_GET['page']-1)*$rowsPerPage; 
$strSQL = "SELECT Ma_sua, ten_sua, Trong_luong, Don_gia FROM sua LIMIT $offset , $rowsPerPage";
$result = mysqli_query($dbc,$strSQL);
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
//$result = mysqli_query($dbc, 'SELECT Ma_sua, ten_sua, Trong_luong, Don_gia FROM sua LIMIT '. $offset . ', ' .$rowsPerPage);
// Xu ly du lieu tra ve
if(mysqli_num_rows($result) == 0)
{
	echo "Chưa có dữ liệu";
}
else
{	echo "<h1 style='color: blue;' align='center'>THÔNG TIN HÃNG SỮA</h1>
		  <table align='center' width='800' border='1' cellpadding='2' cellspacing='2' 
				style='border-collapse: collapse;'>
		  	<tr style='background-color: #0084ab;' align='center'>
				<td><b>Mã sua</b></td>
				<td><b>Tên sữa</b></td>
				<td><b>Trong luong</b></td>
				<td><b>Don gia</b></td>
		  	</tr>";
	$stt=1;
	while ($row = mysqli_fetch_array($result))
	{
		if($stt%2!=0)
		{	echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			//echo "<td>$row[4]</td>";
			echo "</tr>";
		}
		else
		{
			echo "<tr style='background-color: #ffb1007a;'>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			//echo "<td>$row[4]</td>";
			echo "</tr>";
		}
			$stt+=1;
	}
	echo '</table>';
?>
  <div style="text-align:center; font-size:120%; margin-top:10px;">
<?php
	$re = mysqli_query($dbc, 'SELECT * from sua');
	//tổng số mẩu tin cần hiển thị
	$numRows = mysqli_num_rows($re); 
	//tổng số trang
	$maxPage = floor($numRows/$rowsPerPage) + 1; 
	if ($_GET['page'] > 1){
	echo "<a href=" .$_SERVER['PHP_SELF']."?page=1"."><<</a>&nbsp;&nbsp;";
	echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."><</a> ";
	}
	for ($i=1 ; $i<=$maxPage ; $i++){
		if ($i == $_GET['page']){
			echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
	} 
	else
		echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a> ";
	}
	if ($_GET['page'] < $maxPage){
	echo "<a href=". $_SERVER['PHP_SELF']."?page=".$maxPage.">></a> &nbsp;&nbsp;";
	echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']=$maxPage).">>></a>";
	}
}
echo "<p style='color: red;'>Tổng số trang là : ".$maxPage;
echo"</p>";
//Dong ket noi
mysqli_close($dbc);
?>
</div>
</body>
</html>