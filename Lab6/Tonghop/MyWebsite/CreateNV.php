
<?php
include ('includes/header.html'); 
include("includes/connect.php");
?>
<form action="" method="post" enctype="multipart/form-data">
<table bgcolor="#eeeeee" align="center" width="800" border="0" style="margin-top: 20px;">
<tr bgcolor="#eeee10">
	<td colspan="2" align="center"><font color="blue"><h2>THÊM MỚI NHÂN VIÊN</h2></font></td>
</tr>
<tr>
	<td>Mã NV: </td>
	<td><input type="text" name="manv" size="20" value="<?php if(isset($_POST['manv'])) echo $_POST['manv'];?>" /></td>
</tr>
<tr>
	<td>Họ NV: </td>
	<td><input type="text" name="honv" size="50" value="<?php if(isset($_POST['honv'])) echo $_POST['honv'];?>" /></td>
</tr>
<tr>
	<td>Tên NV: </td>
	<td><input type="text" name="tennv" size="20" value="<?php if(isset($_POST['tennv'])) echo $_POST['tennv'];?>" /></td>
</tr>
<tr>
	<td>Ngày Sinh: </td>
	<td><input type="date" name="ngaysinh" size="20" value="<?php if(isset($_POST['ngaysinh'])) echo $_POST['ngaysinh'];?>" /></td>
</tr>
<tr>
	<td>Giới tính: </td>
	<td><input type="text" name="gioitinh" size="20" value="<?php if(isset($_POST['gioitinh'])) echo $_POST['gioitinh'];?>" /></td>
</tr>
<tr>
	<td>Địa chỉ: </td>
	<td><input type="text" name="diachi" size="20" value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi'];?>" /></td>
</tr>
<tr>
	<td>Hình ảnh: </td>
	<td><input type="FILE" name ="hinh" size="80" value="<?php if(isset($_POST['hinh'])) echo $_POST['hinh'];?>" /></td>
</tr>
<tr>
	<td>Loại Nhân Viên:</td>
	<td><select name="loainv">
			<?php 
				$query="select * from loainv";	//Hiển thị tên các hãng sữa
				$result=mysqli_query($mysqli,$query);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result)){
						$ma_loainv=$row['MaLoaiNV'];
						$ten_loainv=$row['TenLoaiNV'];
						echo "<option value='$ma_loainv' "; 
								if(isset($_REQUEST['loainv']) && ($_REQUEST['loainv']==$ma_loainv)) echo "selected='selected'";
						echo ">$ten_loainv</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	</td>
</tr>
<tr>
	<td>Phòng Ban: </td>
	<td><select name="phongban">
			<?php 
				$query="select * from phongban";	
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
	</td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name ="them" size="10" value="Thêm mới" /></td>
</tr>
</table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	$errors=array(); //khởi tạo 1 mảng chứa lỗi
	//kiem tra ma sua
	if(empty($_POST['manv'])){
		$errors[]="Bạn chưa nhập mã";
	}
	else{
		$manv=trim($_POST['manv']);
	}
    if(empty($_POST['honv'])){
		$errors[]="Bạn chưa nhập ho";
	}
	else{
		$honv=trim($_POST['honv']);
	}
	//kiểm tra tên sản phẩm
	if(empty($_POST['tennv'])){
		$errors[]="Bạn chưa nhập tên";
	}
	else{
		$tennv=trim($_POST['tennv']);
	}
	//kiem tra trong luong
	if(empty($_POST['ngaysinh'])){
		$errors[]="Bạn chưa nhập ngay sinh";
	}
	else{
		$ngaysinh=trim($_POST['ngaysinh']);
	}
	//kiem tra don gia
	if(empty($_POST['gioitinh'])){
		$errors[]="Bạn chưa nhap gioi tinh";
	}
	else{
		$gioitinh=trim($_POST['gioitinh']);
	}
    if(empty($_POST['diachi'])){
		$errors[]="Bạn chưa nhap dia chi";
	}
	else{
		$diachi=trim($_POST['diachi']);
	}
	//kiểm tra hình sản phẩm và thực hiện upload file
	if($_FILES['hinh']['name']!=""){
		$hinh=$_FILES['hinh'];
		$ten_hinh=$hinh	['name'];
		$type=$hinh['type'];
		$size=$hinh['size'];
		$tmp=$hinh['tmp_name'];
		if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
		{
			move_uploaded_file($tmp,"hinh/".$ten_hinh);
		}
	}
	//cap nhat ma hang sua va ma loai sua
	$ma_loainv=$_POST['loainv'];
	$ma_pb=$_POST['phongban'];
	if(empty($errors))//neu khong co loi xay ra
	{ 
		$query="INSERT INTO nhanvien VALUES ('$manv','$honv','$tennv','$ngaysinh','$gioitinh','$diachi','$ten_hinh','$ma_loainv','$ma_pb')";
		$result=mysqli_query($mysqli,$query);
		if(mysqli_affected_rows($mysqli)==1){//neu them thanh cong
			echo "<div align='center'>Thêm mới thành công!</div>";			
			$query="SELECT `Ho`, `Ten`,`NgaySinh`,`GioiTinh`,`DiaChi`,`Anh`, `TenLoaiNV`,`TenPhong`
                    FROM nhanvien, loainv, phongban
                    WHERE  nhanvien.MaLoaiNV = loainv.MaLoaiNV
                    AND nhanvien.MaPhong=phongban.MaPhong
                    AND nhanvien.Ten ='". $tennv. "'";
			$result=mysqli_query($mysqli,$query);
			if(mysqli_num_rows($result)==1)
			{	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
				echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
						<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>'.$row['Ho'].' '.$row['Ten'].'</h3></td></tr>';
					echo '<tr><td><img src="hinh/'.$ten_hinh.'" width="90" height="90"/></td>';
								echo '<td>'.$row['NgaySinh'].'|'.$row['GioiTinh']
								.'|'.$row['DiaChi'].'|'.$row['TenLoaiNV'].'|'.$row['TenPhong'];
								echo '</td></tr></table>';				
			}
		}
		else //neu khong them duoc
		{
			echo "<p>Có lỗi, không thể thêm được</p>";
			echo "<p>".mysqli_error($mysqli)."<br/><br />Query: ".$query."</p>";	
		}
	}
	else
	{//neu co loi
		echo "<p>Có lỗi xảy ra:<br/>";
		foreach($errors as $msg)
		{
			echo "- $msg<br /><\n>";
		}
		echo "</p><p>Hãy thử lại.</p>";
	}
}
	mysqli_close($mysqli);
	?>
<?php
include ('includes/footer.html');
?>