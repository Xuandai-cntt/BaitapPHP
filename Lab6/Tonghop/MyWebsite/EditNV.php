<link rel="stylesheet" href="includes/edit.css">
<?php
    if (isset($_GET['MaNV']) && $_GET['MaNV'] != "") {
        // Lấy mã, kiểm tra có nhân viên này trong db không, tại nhiều lúc ngta nhập trên URL mã tầm bậy
        $maNV = $_GET['MaNV'];
        // Kết nối db để thực hiện truy vấn
      include("includes/connect.php");
      include ('includes/header.html');
        // Viết truy vấn tìm xem có nhân viên trong db không
        $qr = "SELECT nv.*, lnv.TenLoaiNV, pb.TenPhong FROM nhanvien nv, phongban pb, loainv lnv WHERE nv.MaNV = '$maNV' AND nv.MaLoaiNV = lnv.MaLoaiNV AND nv.MaPhong = pb.MaPhong";
        // Thực thi câu truy vấn
        $result = mysqli_query($mysqli, $qr);

        $qr1 = "SELECT * FROM loainv";
        $result1 = mysqli_query($mysqli, $qr1);
        $arr = [];
        while($row1 = mysqli_fetch_array($result1)) {
            array_push($arr, $row1);
        }

        
        $qr2 = "SELECT * FROM phongban";
        $result2 = mysqli_query($mysqli, $qr2);
        $arr2 = [];
        while($row2 = mysqli_fetch_array($result2)) {
            array_push($arr2, $row2);
        }
   

        if (mysqli_num_rows($result) != 0) {
            // Chắc chắn chỉ ra 1 bản bên gán vầy luôn
            $row = mysqli_fetch_array($result);
        } else {
            echo "Không tìm thấy";
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
            // Mã nhân viên bây giờ lấy từ POST ra
            $maNV = $_POST['maNV'];
            $ho = $_POST['ho'];
            $ten = $_POST['ten'];
            $ngaySinh = $_POST['ngaySinh'];
            $gioiTinh = $_POST['gioiTinh'];
            $diaChi = $_POST['diaChi'];
            $loaiNV = $_POST['loaiNV'];
            $phongban = $_POST['phongban'];
            //if isset file anh thì
            if ($_FILES['anhNV']['name'] != "") {
                $hinh = $_FILES['anhNV'];
                $ANHNV = $hinh['name'];
                $tmp = $hinh['tmp_name'];
                if (($type == 'image/jpeg' || ($type == 'image/bmp') || ($type == 'image/gif') && $size < 8000)) {
                    move_uploaded_file($tmp, "hinh/" . $ANHNV);
                }
                $query = "UPDATE nhanvien SET Ho = '$ho', Ten = '$ten', NgaySinh = '$ngaySinh', GioiTinh = '$gioiTinh', DiaChi = '$diaChi', Anh = '$ANHNV', MaLoaiNV = '$loaiNV' WHERE MaNV = '$maNV'";
            }
            else{
                $query = "UPDATE nhanvien SET Ho = '$ho', Ten = '$ten', NgaySinh = '$ngaySinh', GioiTinh = '$gioiTinh', DiaChi = '$diaChi', MaLoaiNV = '$loaiNV' WHERE MaNV = '$maNV'";
            }
            
            //else
//kiểu v ảnh lấy trong $_FILE chứ
            // Kết nối db rồi
            // Viết query xóa
            
            // Thực thi câu truy vấn
            $result = mysqli_query($mysqli, $query);   
            // Kiểm tra xóa thành công hay chưa
            if (mysqli_affected_rows($mysqli) == 1 || mysqli_affected_rows($mysqli) == 0) {
                
                header('Location: nhanvieninfo.php');
            } else {
                echo "Có lỗi";
            }
        }
    }
    ?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">CẬP NHẬT THÔNG TIN NHÂN VIÊN</h2>
		</div>
	<div class="panel-body">
        <div class="row">
            <div class="col-6" style="float: right; padding-right:20px;">
                     <img src="hinh/<?php echo $row['Anh'];?>" width="250" height="250"/>
                     <p style="text-align: center;"><?php echo $row['Anh'];?></p>
            </div>
    <div class="col-6">
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="table-fr">
				<tr class="form-group">
					<td class="title-input">Mã nhân viên:</td>
					<td>
            <input required="true" type="text" class="form-control" id="maNV" name="maNV" disabled value="<?php echo $row[0]; ?>">
          </td>
    </tr>

				<tr class="form-group">
					<td class="title-input">Họ nhân viên:</td>
				<td>	
          <input required="true" type="text" class="form-control" id="ho" name="ho" value="<?php echo $row[1];  ?>">
    </td>
    </tr>

                <div class="form-group">
					<td class="title-input">Tên nhân viên:</td>
					<td>
            <input required="true" type="text" class="form-control" id="ten" name="ten" value="<?php echo $row[2];  ?>">
          </td>
          </tr>

                
				<tr class="form-group">
					<td class="title-input">Ngày sinh:</td>
					<td>
            <input type="date" class="form-control" name="ngaySinh" value="<?php echo $row[3]; ?>">
        </td>
      </tr>

                <tr class="form-group">
					<td class="title-input">Giới tính:</td>
         <td> <input type="text" class="form-control" name="gioiTinh" value="<?php echo $row[4]; ?>">
  </td>
  </tr>

				<tr class="form-group">
					<td class="title-input">Địa chỉ:</td>
					<td>
            <input required="true" type="text" class="form-control" id="diaChi" name="diaChi" value="<?php echo $row[5] ?>">
  </td>
  </tr>
                
      <tr class="form-group">
					<td class="title-input">Ảnh nhân viên:</td>
					<td>
					<input type="FILE" id="anhNV" name="anhNV" >
        </td>
           </tr>
                <tr class="form-group">
					<td class="title-input">Loại nhân viên:</td>
					<td><select name="loaiNV" class="form-control">
						<!-- <option value="<?php echo $row['MaLoaiNV'] ?>" class="form-control"> -->
						<?php
						echo $row['TenLoaiNV'];

						?></option>
						<?php
						foreach ($arr as $loaiNV) {
							if ($row['MaLoaiNV'] == $loaiNV['MaLoaiNV']) {
								$s = "selected";
							} else {
								$s = "";
							}
							echo '<option ' . $s . ' value="' . $loaiNV['MaLoaiNV'] . '" class = "form-control">' . $loaiNV['TenLoaiNV'] . '</option>';
						}
						?>
					</select></td>
          </tr>

                <tr class="form-group">
					<td class="title-input">Phòng ban:</td>
					<td><select name="phongban" class="form-control">
						<!-- <option value="<?php echo $row['MaPhong'] ?>" class="form-control"> -->
						<?php
						echo $row['TenPhong'];
						?></option>
						<?php
						foreach ($arr2 as $phongban) {
							if ($row['MaPhong'] == $phongban['MaPhong']) {
								$s = "selected";
							} else {
								$s = "";
							}
							echo '<option ' . $s . ' value="' . $phongban['MaPhong'] . '" class = "form-control">' . $phongban['TenPhong'] . '</option>';
						}
						?>
					</select></td>
          </tr>

				<tr class="form-group">
             <td>   <input type="hidden" name="maNV" value="<?php echo $row[0]; ?>"></td>
        <td colspan="2" align="center"><input type="submit" value="Lưu"></td>
					<td class="col-md-offset-2 col-md-6">
						<button class="comeback">
							<a href="javascript:window.history.back(-1);">Quay lại</a>
						</button>
					</td>
          </tr>
        </table>
			</form>
                    </div>
      </div>
		</div>
	</div>
</div>
<?php
include ('includes/footer.html');
?>