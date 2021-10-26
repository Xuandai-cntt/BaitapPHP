<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
	// Ket noi CSDL
include("includes/connect.php");
include ('includes/header.html');
?>
<style>
	img{
		border-radius: 15px;
	}
</style>
<?php 
$rowsPerPage=3; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page']))
{ $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset =($_GET['page']-1)*$rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
$strSQL = "SELECT MaNV,Ho,Ten,NgaySinh,GioiTinh,DiaChi,Anh,TenLoaiNV,TenPhong from nhanvien ,phongban,loainv WHERE nhanvien.MaLoaiNV=loainv.MaLoaiNV AND nhanvien.MaPhong=phongban.MaPhong LIMIT $offset,$rowsPerPage;";
$result = mysqli_query($mysqli,$strSQL);
// Xu ly du lieu tra ve
if(mysqli_num_rows($result) == 0)
{
	echo "Chưa có dữ liệu";
}
else
{	echo "<h1 style='color: blue;' align='center'>THÔNG TIN NHÂN VIÊN</h1>
		  <table align='center' width='800' height='400' border='1'
				style='border-collapse: collapse;'>
		  	<tr style='background-color: #0084ab;' align='center'>
				<td><b>Họ NV</b></td>
				<td><b>Tên NV</b></td>
				<td><b>Ngày Sinh</b></td>
				<td><b>Giới Tính</b></td>
				<td><b>Địa Chỉ</b></td>
				<td><b>Ảnh</b></td>
				<td><b>Loại NV</b></td>
				<td><b>Phòng Ban</b></td>
				<td><b>Active<b></td>
		  	</tr>";
	$stt=1;
	while ($row = mysqli_fetch_array($result))
	{
		if($stt%2!=0)
		{	echo "<tr style='text-align:center;'>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			echo "<td>$row[5]</td>";
			echo "<td>";?>
			<img src="hinh/<?php echo $row['Anh'];?>" width="60" height="60"/>
			<?php
			echo "</td>";
			echo "<td>$row[7]</td>";
			echo "<td>$row[8]</td>";
			?>
			<td>
				<button type="button" class="btn btn-outline-warning" onclick="window.open('EditNV.php?MaNV=<?php echo $row['MaNV'];?>')">Edit</button>
				<button type="button" class="btn btn-outline-danger" onclick="window.open('DelNV.php?MaNV=<?php echo $row['MaNV'];?>')">Del</button>
			</td>
		   <?php
			echo "</tr>";
		}
		else
		{
			echo "<tr style='background-color: #9966FF; text-align:center;'>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			echo "<td>$row[5]</td>";
			echo "<td>";?>
			<img src="hinh/<?php echo $row['Anh'];?>" width="60" height="60"/>
			<?php
			echo "</td>";
			echo "<td>$row[7]</td>";
			echo "<td>$row[8]</td>";
			?>
			<td>
				<button type="button" class="btn btn-outline-warning"onclick="window.open('EditNV.php?MaNV=<?php echo $row['MaNV'];?>')">Edit</button>
				<button type="button" class="btn btn-outline-danger"onclick="window.open('DelNV.php?MaNV=<?php echo $row['MaNV'];?>')">Del</button>
			</td>
		   <?php
			echo "</tr>";
		}
			$stt+=1;
	}
	echo '</table>';
	?>
<div style="text-align:center; font-size:120%; margin-top:10px;">
	<?php
	$strSQL = "SELECT MaNV,Ho,Ten,NgaySinh,GioiTinh,DiaChi,Anh,TenLoaiNV,TenPhong from nhanvien ,phongban,loainv WHERE nhanvien.MaLoaiNV=loainv.MaLoaiNV AND nhanvien.MaPhong=phongban.MaPhong LIMIT $offset,$rowsPerPage;";
	$re = mysqli_query($mysqli,$strSQL);
	//tổng số mẩu tin cần hiển thị
	$numRows = mysqli_num_rows($re); 
	//tổng số trang
	$maxPage = floor($numRows/$rowsPerPage) + 1; 
	if ($_GET['page'] > 1){
	echo "<a href=" .$_SERVER['PHP_SELF']."?page=1".">Trang Đầu</a>&nbsp;&nbsp;";
	echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Back</a> ";
	}
	for ($i=1 ; $i<=$maxPage ; $i++){
		if ($i == $_GET['page']){
			echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
	} 
	else
		echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a> ";
	}
	if ($_GET['page'] < $maxPage){
	echo "<a href=". $_SERVER['PHP_SELF']."?page=".$maxPage.">Next</a> &nbsp;&nbsp;";
	echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']=$maxPage).">Trang Cuối</a>";
	}
}
//Dong ket noi
mysqli_close($mysqli);
?>
<?php
include ('includes/footer.html');
?>
