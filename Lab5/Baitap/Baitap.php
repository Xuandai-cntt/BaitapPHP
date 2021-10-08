<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="Baitap.css">
<title>BÀI TOÁN</title>
</head>
<body>
<?php
    abstract class Nguoi{
        protected $hoten, $diachi, $gioitinh;
        public function setTen($hoten){
            $this->hoten=$hoten;
        }
        public function getTen(){
            return $this->hoten;
        }
        public function setDiachi($diachi){
            $this->diachi=$diachi;
        }
        public function getDiachi(){
            return $this->diachi;
        }
        public function setGioitinh($gioitinh){
            $this->gioitinh=$gioitinh;
        }
        public function getGioitinh(){
            return $this->gioitinh;
        }
    }
    class SinhVien extends Nguoi{
        public $lophoc, $nganhhoc;
        public function setLophoc($lophoc){
            $this->lophoc=$lophoc;
        }
        public function getLophoc(){
            return $this->lophoc;
        }
        public function setNganhhoc($nganhhoc){
            $this->nganhhoc=$nganhhoc;
        }
        public function getNganhhoc(){
            return $this->nganhhoc;
        }
        function tinh_diemthuong(){
            if($this->nganhhoc=="Công nghệ thông tin"){
                return 1;
            }else if($this->nganhhoc=="Kinh tế"){
                return 1.5;
            }else 
            return 0;
        }
    }
    class GiangVien extends Nguoi{
        public $trinhdo;
        public function setTrinhdo($trinhdo){
            $this->trinhdo=$trinhdo;
        }
        public function getTrinhdo(){
            return $this->trinhdo;
        }
        const luong=1500000;
        function tinh_luong(){
            if($this->trinhdo=="Cử nhân"){
                return self::luong*2.34;
            }else if($this->trinhdo=="Tiến sĩ"){
                return self::luong*3.67;
            }else 
            return self::luong*5.66;
        }
    }
    
$hienthi=NULL;
if(isset($_POST['hienthi'])){
	if(isset($_POST['nguoi']) && ($_POST['nguoi'])=="SV"){
		$sv=new SinhVien();
		$sv->setTen($_POST['ten']);
		$sv->setDiachi($_POST['diachi']);
        $sv->setGioitinh($_POST['gioitinh']);
        $sv->setNganhhoc($_POST['nganh']);
		$hienthi= "Họ và tên ".$sv->getTen()."\n".
		 		"Địa chỉ ".$sv->getDiachi()."\n".
                 "Giới tính ".$sv->getGioitinh()."\n".
                 "Ngành học ".$sv->getNganhhoc()."\n".
                 "Tính điểm thưởng ".$sv->tinh_diemthuong();
	}
    if(isset($_POST['nguoi']) && ($_POST['nguoi'])=="GV"){
		$gv=new GiangVien();
		$gv->setTen($_POST['ten']);
		$gv->setDiachi($_POST['diachi']);
        $gv->setGioitinh($_POST['gioitinh']);
        $gv->setTrinhdo($_POST['trinhdo']);
		$hienthi= "Họ và tên ".$gv->getTen()." \n".
		 		"Địa chỉ ".$gv->getDiachi()."\n".
                 "Giới tính ".$gv->getGioitinh()."\n".
                 "Trinh độ ".$gv->getTrinhdo()."\n".
                 "Tính lương ".$gv->tinh_luong();
	}
}
?>
<form action="" method="post">
<fieldset>
	<legend style="color: yellow;">BÀI TOÁN</legend>
	<table border='0'>
		<tr>
			<td id="title">Chọn SV/GV</td>
			<td><input type="radio" name="nguoi" value="SV" 
					<?php if(isset($_POST['nguoi'])&&($_POST['nguoi'])=="SV") echo 'checked'?>/>Sinh Viên
				<input type="radio" name="nguoi" value="GV"
					<?php if(isset($_POST['nguoi'])&&($_POST['nguoi'])=="GV") echo 'checked'?>/>Giảng Viên
			</td>
		</tr>
		<tr>
			<td id="title">Nhập tên:</td>
			<td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td>
		</tr>
		<tr>
			<td id="title">Địa chỉ:</td>
			<td><input type="text"  name="diachi" value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi'];?>"/></td>
		</tr>
        <tr>
			<td id="title">Giới Tính:</td>
            <td> <input type="radio" name="gioitinh" value="Nam"
                <?php if(isset($_POST['gioitinh'])&&($_POST['gioitinh'])=="Nam") echo 'checked'?>/>Nam
            <input type="radio" name="gioitinh" value="Nữ"
                <?php if(isset($_POST['gioitinh'])&&($_POST['gioitinh'])=="Nữ") echo 'checked'?>/>Nữ</td>
        </tr>
        <tr>
			<td id="title">Ngành(*SV)</td>
			<td><input type="radio" name="nganh" value="Công nghệ thông tin" 
					<?php if(isset($_POST['nganh'])&&($_POST['nganh'])=="Công nghệ thông tin") echo 'checked'?>/>Công Nghệ Thông Tin
            <input type="radio" name="nganh" value="Kinh tế" 
					<?php if(isset($_POST['nganh'])&&($_POST['nganh'])=="Kinh tế") echo 'checked'?>/>Kinh Tế
            <input type="radio" name="nganh" value="Khác" 
					<?php if(isset($_POST['nganh'])&&($_POST['nganh'])=="Khác") echo 'checked'?>/>Khác</td>
        </tr>
        <tr>
            <td id="title">Trình độ(*GV)</td>
			<td><input type="radio" name="trinhdo" value="Cử nhân"
					<?php if(isset($_POST['trinhdo'])&&($_POST['trinhdo'])=="Cử nhân") echo 'checked'?>/>Cử nhân
            <input type="radio" name="trinhdo" value="Tiến sĩ"
					<?php if(isset($_POST['trinhdo'])&&($_POST['trinhdo'])=="Tiến sĩ") echo 'checked'?>/>Tiến Sĩ
            <input type="radio" name="trinhdo" value="Thạc sĩ"
					<?php if(isset($_POST['trinhdo'])&&($_POST['trinhdo'])=="Thạc sĩ") echo 'checked'?>/>Thạc sĩ</td>
			
		</tr>
		<tr><td id="title">Kết quả:</td>
			<td><textarea name="ketqua" cols="70" rows="10" disabled="disabled"><?php echo $hienthi;?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="hienthi" value="Hiển thị"/></td>
		</tr>
	</table>
</fieldset>
</form>
</body>
</html>