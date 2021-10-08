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
		$arr1=array();
		$arr2=array();
		for($i=0;$i<$n;$i++)
		{
			$x=rand(-200,200);
			$arr[$i]=$x;
		}
		//In ra mảng vừa tạo
		$ketqua="Mảng được tạo là:" .implode(" ",$arr)."";
		//SX mang
		sort($arr);
		$ketqua.="\nMang sau khi sx:";
		foreach($arr as $v){
            $ketqua.= "$v &nbsp;";
		}
		//Chen x vao mang
		$x=99;
		$inserted = array( $x ); 
		$vitri=3;
		$vt=$vitri+1;
		array_splice( $arr, $vitri, 0, $inserted );//vitri 3
		$ketqua.="\nMang sau khi chen $x vao vi tri $vt: ";
		foreach($arr as $v){
            $ketqua.= "$v &nbsp;";
		}
		//sx sau chen: dautien-->chen: tang, chen-->cuoi: giam
		$ketqua.="\nMang sau khi chen sx:";
		//mang 1
		for($i=0;$i<=$vitri;$i++){
			$arr1[$i]=$arr[$i];
		 }
		sort($arr1);
		foreach($arr1 as $v){
            $ketqua.= "$v &nbsp;";
		}
		//mang 2
		for($i=$vt;$i<count($arr);$i++){
			$arr2[$i]=$arr[$i];
		 }
		 rsort($arr2);
		foreach($arr2 as $v){
            $ketqua.= "$v &nbsp;";
		}
	}
?>
<table class="table">
<form class="form1" action="" method="post">
	<td class="nhap_ip">
	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>
	<input type="submit" name="hthi" value="Hiển thị"/>
	</td>
	<td class="out_put">
		Kết quả<br>
	<textarea cols="70" rows="10" name="ketqua"><?php echo $ketqua?></textarea>
	</td>
</form>
</table>
</body>
</html>