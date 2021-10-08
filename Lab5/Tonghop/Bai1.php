<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="Bai1.css">
<title>Tinh chu vi va dien tich</title>
</head>
<body>
<?php

use HinhChuNhat as GlobalHinhChuNhat;

abstract class Hinh{
	protected $ten, $dodai;
	public function setTen($ten){
		$this->ten=$ten;
	}
	public function getTen(){
		return $this->ten;
	}
	public function setDodai($doDai){
		$this->dodai=$doDai;
	}
	public function getDodai(){
		return $this->dodai;
	}
	abstract public function tinh_CV();
	abstract public function tinh_DT();
}
class HinhTron extends Hinh{
	const PI=3.14;
	function tinh_CV(){
		return $this->dodai[0]*2*self::PI;
	}
	function tinh_DT(){
		return pow($this->dodai[0],2)*self::PI;
	}
}
class HinhVuong extends Hinh{
	public function tinh_CV(){
		return $this->dodai[0]*4;
	}
	public function tinh_DT(){
		return pow($this->dodai[0],2);
	}
}
class HinhTGdeu extends Hinh{
    public function tinh_CV(){
        return $this->dodai[0]*3;
    }  
    public function tinh_DT(){
        return pow($this->dodai[0],2)*sqrt(3/4);
    }
}
class HinhTGnom extends Hinh{
    public function tinh_CV(){
        return (($this->dodai[0])+($this->dodai[1])+($this->dodai[2]));
    }  
    public function tinh_DT(){
        $p = (1 / 2) * (($this->dodai[0])+($this->dodai[1])+($this->dodai[2]));
		return round(sqrt($p*($p-$this->dodai[0])*($p-$this->dodai[1])*($p-$this->dodai[2])), 2);
    }     
}
class HinhChuNhat extends Hinh{
    public function tinh_CV(){
        return (($this->dodai[0])+($this->dodai[1]))*2;
    }  
    public function tinh_DT(){
		return ($this->dodai[0])*($this->dodai[1]);
    }     
}

$str=NULL;
$errors[]="";
if(isset($_POST['tinh'])){
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="hv"){
		$hv=new HinhVuong();
		$hv->setTen($_POST['ten']);
		$hv->setDodai($_POST['dodai']);
		$str= "Diện tích hình vuông ".$hv->getTen()." là : ".$hv->tinh_DT()." \n".
		 		"Chu vi của hình vuông ".$hv->getTen()." là : ".$hv->tinh_CV();
	}
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="ht"){
		$ht=new HinhTron();
		$ht->setTen($_POST['ten']);
		$ht->setDodai($_POST['dodai']);
		$str= "Diện tích của hình tròn ".$ht->getTen()." là : ".$ht->tinh_DT()." \n".
				"Chu vi của hình tròn ".$ht->getTen()." là : ".$ht->tinh_CV();
	}
    if(isset($_POST['hinh']) && ($_POST['hinh'])=="htgd"){
		$htgd=new HinhTGdeu();
		$htgd->setTen($_POST['ten']);
		$htgd->setDodai($_POST['dodai']);
		$str= "Diện tích của hình tam giac deu".$htgd->getTen()." là : ".$htgd->tinh_DT()." \n".
				"Chu vi của hình tam giac deu ".$htgd->getTen()." là : ".$htgd->tinh_CV();
	}
    if(isset($_POST['hinh']) && ($_POST['hinh'])=="htgnom"){
		$hinh = $_POST['hinh'];
		$ten = trim($_POST['ten']);
		$doDai = trim($_POST['dodai']);
		$arr = explode(",", $doDai);
		if(count($arr)==3){
		if(($arr[0]+$arr[1]>$arr[2])&&($arr[0]+$arr[2]>$arr[1])&&($arr[1]+$arr[2]>$arr[0])){
		$htgnom=new HinhTGnom();
		$htgnom->setTen($ten);
		$htgnom->setDodai($arr);
		$str= "Diện tích của hình tam giac".$htgnom->getTen()." là : ".$htgnom->tinh_DT()." \n".
				"Chu vi của hình tam giac".$htgnom->getTen()." là : ".$htgnom->tinh_CV();
		}
		else array_push($errors,"(*).Dữ liệu nhập vào không là 3 cạnh của tam giác");
		}
		else array_push($errors,"(*).Chưa nhập đủ số cạnh của tam giác");
	}
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="hcn"){
		$hinh = $_POST['hinh'];
		$ten = trim($_POST['ten']);
		$doDai = trim($_POST['dodai']);
		$arr = explode(",", $doDai);
		$hcn=new HinhChuNhat();
		$hcn->setTen($ten);
		$hcn->setDodai($arr);
		$str= "Diện tích của hình chữ nhật".$hcn->getTen()." là : ".$hcn->tinh_DT()." \n".
				"Chu vi của hình chữ nhật".$hcn->getTen()." là : ".$hcn->tinh_CV();
	}
}
?>
<form action="" method="post">
<fieldset>
	<legend>Tính chu vi và diện tích các hình đơn giản</legend>
	<table border='0'>
		<tr>
			<td>Chọn hình</td>
			<td><input type="radio" name="hinh" value="hv" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hv") echo 'checked'?>/>Hình vuông
				<input type="radio" name="hinh" value="ht"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="ht") echo 'checked'?>/>Hình tròn
                <input type="radio" name="hinh" value="htgd"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="htgd") echo 'checked'?>/>Hình tam giác đều
                <input type="radio" name="hinh" value="htgnom"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="htgnom") echo 'checked'?>/>Hình tam giác thường
				<input type="radio" name="hinh" value="hcn"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hcn") echo 'checked'?>/>Hình chữ nhật
			</td>
		</tr>
		<tr>
			<td>Nhập tên:</td>
			<td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td>
		</tr>
		<tr>
			<td>Nhập độ dài:</td>
			<td><input type="text"  name="dodai" value="<?php if(isset($_POST['dodai'])) echo $_POST['dodai'];?>"/>
			<span style="color:red;">(*).Số cạnh tương ứng với hình được lấy theo thứ tự nhập vào từ trái->phải !!</span></td>
		</tr>
		<tr><td>Kết quả:</td>
			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="color: red;">
				<?php
					if (count($errors) > 0) {
						foreach ($errors as $err) {
							echo $err . "<br>";
						}
					}
				?>
			</td>
		</tr>
	</table>
</fieldset>
</form>
</body>
</html>