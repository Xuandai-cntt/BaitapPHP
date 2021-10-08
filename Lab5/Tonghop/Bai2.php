<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="Bai2.css">
</head>
<body>
<?php
class PHAN_SO
{	var $tuso, $mauso;
	function get_tuso()
	{	return $this-> tuso;
		
	}
	function set_tuso($value)
	{	$this->tuso=$value;
		
		}
	function get_mauso()
	{	return $this->mauso;
		}	
	function set_mauso($value)
	{
		$this->mauso=$value;
	}
	function khoitao_ps($p_ts, $p_ms)
	{
		$this->tuso=$p_ts;
		$this->mauso=$p_ms;
	}
	//tim USCLN cua 2 so
	function USCLN($a,$b)
	{	//neu phan so am thi doi dau cua tu so
		if($a<0) $a=(-1)*$a;
		$sonho=($a<$b)? $a :$b;
		for($i=$sonho;$i>0;$i--)
			if(($a%$i)==0 && ($b%$i)==0)
			{	//return $i;
				break;
			}
		return $i;
	
	}
	//toi gian phan so
	function toigian_ps()
	{	$uscln=$this->USCLN($this->tuso, $this->mauso);
		$this->tuso=$this->tuso/$uscln;
		$this->mauso=$this->mauso/$uscln;
		
	}
	//tinh tong hai phan so
	function tong($p_tuso,$p_mauso)
	{	$ps= new PHAN_SO();
		$ps->khoitao_ps($p_tuso,$p_mauso);
		$ps->tuso=($this->tuso*$ps->mauso)+ ($ps->tuso*$this->mauso);
		$ps->mauso= $this->mauso*$ps->mauso;
		$ps->toigian_ps();
		return $ps;		
	}
	//tinh hieu 2 phan so
	function hieu($p_tuso,$p_mauso)
	{	$ps= new PHAN_SO();
		$ps->khoitao_ps($p_tuso,$p_mauso);
		$ps->tuso=($this->tuso*$ps->mauso)- ($ps->tuso*$this->mauso);
		$ps->mauso= $this->mauso*$ps->mauso;
		//$ps->toigian_ps();
		return $ps;
	}
    //tich 2 phan so
    function tich($p_tuso,$p_mauso)
	{	$ps= new PHAN_SO();
		$ps->khoitao_ps($p_tuso,$p_mauso);
		$ps->tuso=($this->tuso*$ps->tuso);
		$ps->mauso= $this->mauso*$ps->mauso;
		//$ps->toigian_ps();
		return $ps;
	}
    //thuong 2 phan so
    function thuong($p_tuso,$p_mauso)
	{	$ps= new PHAN_SO();
		$ps->khoitao_ps($p_mauso,$p_tuso);
		$ps->tuso=($this->tuso*$ps->tuso);
		$ps->mauso= $this->mauso*$ps->mauso;
		//$ps->toigian_ps();
		return $ps;
	}
		
}

?>
<?php
	$tuso_1=isset($_POST['tuso_1'])?$_POST['tuso_1']:'';
	$mauso_1=isset($_POST['mauso_1'])?$_POST['mauso_1']:'';
	$tuso_2=isset($_POST['tuso_2'])?$_POST['tuso_2']:'';
	$mauso_2=isset($_POST['mauso_2'])?$_POST['mauso_2']:'';
?>
<table class="table">
<form id="form1" name="form1" method="post" action="">
<fieldset>
  	<legend><font color="yellow"> Chọn phép tính trên phân số</font></legend>
  	<p>Nhập phân số thứ 1: Tử số:
    	<input name="tuso_1" type="text" id="tuso_1" size="10" maxlength="10" value="<?php echo $tuso_1?>"/> 
    	Mẫu số:
    	<input name="mauso_1" type="text" id="mauso_1" size="10" maxlength="10" value="<?php echo $mauso_1?>"/>
  	</p>
  	<p>Nhập phân số thứ 2: Tử số: 
    	<input name="tuso_2" type="text" id="tuso_2" size="10" maxlength="10" value="<?php echo $tuso_2?>"/>
  		Mẫu số: 
  		<input name="mauso_2" type="text" id="mauso_2" size="10" maxlength="10" value="<?php echo $mauso_2?>"/>
  	</p>
    	<strong>Chọn phép tính</strong>
    	<p>
    		<label>
        		<input type="radio" name="pheptinh" value="cộng" 
        			<?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="cộng") echo 'checked'?>  />
        		Cộng
        	</label>
      		<label>
        		<input type="radio" name="pheptinh" value="trừ"  
        			<?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="trừ") echo 'checked'?>/>
        		Trừ
    		</label>
            <label>
        		<input type="radio" name="pheptinh" value="nhân"  
        			<?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="nhân") echo 'checked'?>/>
        		Nhân
    		</label>
            <label>
        		<input type="radio" name="pheptinh" value="chia"  
        			<?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="chia") echo 'checked'?>/>
        		Chia
    		</label>
    	</p>
  	<p>
    	<input name="Chon_pheptinh" type="submit" value="Kết quả" />
  	</p>
</fieldset>
</form>
</table>
<?php
	$ps_1=new PHAN_SO();
	$ps_1->set_tuso($tuso_1);
	$ps_1->set_mauso($mauso_1);
	$ps_2=new PHAN_SO();
	$ps_2->khoitao_ps($tuso_2,$mauso_2);
	$ketqua="";
	if (isset($_POST['Chon_pheptinh'])) 
	{
		$pheptinh=$_POST['pheptinh'];
		switch($pheptinh)
		{	case "cộng": 
						$ps=new PHAN_SO();
						$ps=$ps_1->tong($ps_2->tuso,$ps_2->mauso);
						$ketqua=$ps_1->get_tuso()."/".$ps_1->get_mauso()."+".$ps_2->get_tuso()."/".$ps_2->get_mauso()."=".$ps->get_tuso()."/".$ps->get_mauso();
						break;
			case "trừ":
						$ps=new PHAN_SO();
						$ps=$ps_1->hieu($ps_2->tuso,$ps_2->mauso);
						$ketqua=$ps_1->get_tuso()."/".$ps_1->get_mauso()."-".$ps_2->get_tuso()."/".$ps_2->get_mauso()."=".$ps->get_tuso()."/".$ps->get_mauso();
						break;
        	case "nhân":
						$ps=new PHAN_SO();
						$ps=$ps_1->tich($ps_2->tuso,$ps_2->mauso);
						$ketqua=$ps_1->get_tuso()."/".$ps_1->get_mauso()."*".$ps_2->get_tuso()."/".$ps_2->get_mauso()."=".$ps->get_tuso()."/".$ps->get_mauso();
						break;
        	case "chia":
						$ps=new PHAN_SO();
						$ps=$ps_1->thuong($ps_2->tuso,$ps_2->mauso);
						$ketqua=$ps_1->get_tuso()."/".$ps_1->get_mauso().":".$ps_2->get_tuso()."/".$ps_2->get_mauso()."=".$ps->get_tuso()."/".$ps->get_mauso();
						break;
								
		}
		echo "Phép ".$pheptinh." là : ". $ketqua;
	}
	
?>
</body>
</html>