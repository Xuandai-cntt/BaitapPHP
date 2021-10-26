
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<?php
	// Ket noi CSDL
include("../include/connect.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thong tin nhan vien</title>
</head>
<body>
<?php 
// Chuan bi cau truy van & Thuc thi cau truy van
$strSQL = "SELECT * FROM nhanvien";
$result = mysqli_query($mysqli,$strSQL);
// Xu ly du lieu tra ve
if(mysqli_num_rows($result) == 0)
{
	echo "Chưa có dữ liệu";
}
else
{	echo "<h1 style='color: blue;' align='center'>THÔNG TIN NHÂN VIÊN</h1>
		  <table align='center' width='800' border='1' cellpadding='2' cellspacing='2' 
				style='border-collapse: collapse;'>
		  	<tr style='background-color: #0084ab;' align='center'>
				<td><b>Mã NV</b></td>
				<td><b>Họ NV</b></td>
				<td><b>Tên NV</b></td>
				<td><b>Ngày Sinh</b></td>
				<td><b>Giới Tính</b></td>
				<td><b>Địa Chỉ</b></td>
				<td><b>Ảnh</b></td>
				<td><b>Loại NV</b></td>
				<td><b>Phòng Ban</b></td>
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
			echo "<td>$row[4]</td>";
			echo "<td>$row[5]</td>";
			echo "<td>$row[6]</td>";
			if($row[7]=="NVbh"){
				$row[7]="NV Ban Hang";
			}
			echo "<td>$row[7]</td>";
			if($row[8]=="PHbh"){
				$row[8]="Phong Ban Hang";
			}
			echo "<td>$row[8]</td>";
			echo "</tr>";
		}
		else
		{
			echo "<tr style='background-color: #ffb1007a;'>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			echo "<td>$row[5]</td>";
			echo "<td>$row[6]</td>";
			if($row[7]=="NVpv"){
				$row[7]="NV Phuc Vu";
			}
			echo "<td>$row[7]</td>";
			if($row[8]=="PHpv"){
				$row[8]="Phong Phuc Vu";
			}
			echo "<td>$row[8]</td>";
			echo "</tr>";
		}
			$stt+=1;
	}
	echo '</table>';
}
//Dong ket noi
mysqli_close($mysqli);
?>
</body>
</html>