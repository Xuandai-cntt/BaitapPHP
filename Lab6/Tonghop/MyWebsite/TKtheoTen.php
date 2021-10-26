
<?php
	// Ket noi CSDL
include ('includes/header.html');
include("includes/connect.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tìm nhân viên</title>
</head>
<body>
<form action="" method="get">
<table bgcolor="#eeeeee" align="center" width="800" border="1" 
	   cellpadding="5" cellspacing="5" style="border-collapse: collapse; margin-top:20px;">
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
		$query=" SELECT *,TenLoaiNV,TenPhong
        FROM nhanvien, loainv, phongban
        WHERE  nhanvien.MaLoaiNV = loainv.MaLoaiNV AND nhanvien.MaPhong=phongban.MaPhong AND nhanvien.Ten like '%$tennv%'";
		$result=mysqli_query($mysqli,$query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($mysqli), E_USER_ERROR);		
		if(mysqli_num_rows($result)>0)
		{	$rows=mysqli_num_rows($result);
			echo "<div align='center'><b>Có $rows nhân viên được tìm thấy.</b></div>";
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
						<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>'.$row['Ho'].' '.$row['Ten'].'-'.$row['NgaySinh'].'</h3></td></tr>';
					echo '<tr><td><img src="hinh/'.$row['Anh'].'" width="90" height="90"/></td>';
								echo '<td>'.$row['GioiTinh']
								.'-'.$row['DiaChi'].'-'.$row['TenLoaiNV'].'-'.$row['TenPhong'];
								echo '</td></tr></table>';
			}
		}
		else echo "<div><b>Không tìm thấy .</b></div>";
	}
}
?>
<?php
include ('includes/footer.html');
?>