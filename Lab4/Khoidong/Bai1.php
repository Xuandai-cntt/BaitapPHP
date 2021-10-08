<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="Bai1.css">
	<title>Xử lý n</title>
</head>
<body>
<?php
	if(isset($_POST['n'])) {
        $n=$_POST['n'];
    }
	else $n=0;

	$ketqua="";
	if(isset($_POST['hthi'])) 
	{	//Tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
		$arr=array();
		for($i=0;$i<$n;$i++)
		{
			$x=rand(-200,200);
			$arr[$i]=$x;
		}
		//In ra mảng vừa tạo
		$ketqua="Mảng được tạo là:" .implode(" ",$arr)."&#13;&#10;";

		//Tìm và in ra các số dương chẵn trong mảng dùng hàm foreach
		$count=0;
		foreach($arr as $v){
			if($v%2==0 && $v>0 )
				$count++;
		}
		$ketqua.="Có $count số chẵn >0 trong mảng". "&#13;&#10;";

		//Tìm và in ra các số <n có chữ số cuối là số lẻ
		$ketqua .="Các số < $n có chữ số cuối là số lẻ là: ";
		$daySo = "";
		for($i=0;$i<count($arr);$i++){
			$soCuoi = $arr[$i]%10;
			if($soCuoi %2 !=0)
				$daySo .= "$arr[$i]  ";
		}
		$ketqua .= $daySo;
				
	}
?>
<form action="" method="post">
	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>
	<input type="submit" name="hthi" value="Hiển thị"/>
	Kết quả: <br>
	<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>
</form>
</body>
</html>