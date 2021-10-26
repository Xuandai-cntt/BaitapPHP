<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<?php
	// Ket noi CSDL
include("../include/connect.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tim nhan vien</title>
</head>
<body>
<form action="" method="get">
<table bgcolor="#eeeeee" align="center" width="70%" border="1" 
	   cellpadding="5" cellspacing="5" style="border-collapse: collapse;">
<tr>
	<td align="center"><font color="blue"><h3>TÌM KIẾM THÔNG TIN NV</h3></font></td>
</tr>
<tr>
	<td align="center">Tên NV: <input type="text" name="tennv" size="30" 
				value="<?php if(isset($_GET['tennv'])) echo $_GET['tennv'];?>">
			<input type="submit" name="tim" value="Tìm kiếm"></td>
</tr>
</table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=='GET')
{
	if(empty($_GET['tennv'])) echo "<p align='center'>Vui lòng nhập tên nhan vien</p>";
	else
	{
		$tennv=$_GET['tennv'];	
		$query=" SELECT `Ho`, `Ten`, `TenLoaiNV`,`TenPhong`
        FROM nhanvien, loainv, phongban
        WHERE  nhanvien.MaLoaiNV = loainv.MaLoaiNV AND nhanvien.MaPhong=phongban.MaPhong AND nhanvien.Ten like '%$tennv%'";
		$result=mysqli_query($mysqli,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($mysqli), E_USER_ERROR);		
		if(mysqli_num_rows($result)>0)
		{	$rows=mysqli_num_rows($result);
			echo "<div align='center'><b>Có $rows nhan vien được tìm thấy.</b></div>";
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
					<tr bgcolor="#eeeeee"><td colspan="2" align="center">
						<td>
							<h3>'.
								"Thong tin nhan vien".
							'</h3>					
						'.$row['Ho'].' '.$row['Ten'].' - '.$row['TenLoaiNV'].' - '.$row['TenPhong'].'</td>
					</tr>';					
				echo '</table>';
			}
		}
		else echo "<div><b>Không tìm thấy .</b></div>";
	}
}
?>
</body>
</html>