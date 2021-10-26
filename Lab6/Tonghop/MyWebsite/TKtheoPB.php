
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
<table bgcolor="#eeeeee" align="center" width="800"style="border-collapse: collapse; margin-top:20px;">
<tr>
	<td style="text-align:center;"><font color="blue"><h3>TÌM KIẾM THÔNG TIN NV</h3></font></td>
</tr>
<tr>
<td style="text-align: center;">Phòng Ban:
		<select name="phongban">
		<?php 
				$query="select * from phongban";	//Hiển thị tên các loại sữa
				$result=mysqli_query($mysqli,$query);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result)){
						$ma_pb=$row['MaPhong'];
						$ten_pb=$row['TenPhong'];
						echo "<option value='".$ma_pb."' "; 
							if(isset($_REQUEST['phongban']) && ($_REQUEST['phongban']==$ma_pb)) echo "selected='selected'";
						echo ">".$ten_pb."</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
		<style>
			.login_btn{
				color: black;
				background-color: #FFC312;
				width: 100px;
			}
			.login_btn:hover{
				color: black;
				background-color: white;
			}
			
		</style>
		<input class="btn float-right login_btn" type="submit" name="tim" value="Tìm kiếm">
	</td>
</tr>
</table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=='GET')
{
	if(empty($_GET['phongban'])) echo "<p align='center'>Vui lòng nhập tên phòng ban </p>";
	else
	{
		$tennv=$_GET['phongban'];	
		$query=" SELECT *,TenLoaiNV,TenPhong
        FROM nhanvien, loainv, phongban
        WHERE  nhanvien.MaLoaiNV = loainv.MaLoaiNV AND nhanvien.MaPhong=phongban.MaPhong AND PhongBan.MaPhong like '%$tennv%'";
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