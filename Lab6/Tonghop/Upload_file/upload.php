<form method="POST" action="upload.php" 
enctype="multipart/form-data">
<input type="FILE" name ="ProductImg"><br>
<input type="submit" value="Submit">
</form>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
if($_FILES['ProductImg']['name']!=""){
		$hinh=$_FILES['ProductImg'];
		$ten_hinh=$hinh	['name'];
		$type=$hinh['type'];
		$size=$hinh['size'];
		$tmp=$hinh['tmp_name'];
		if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
		{
			move_uploaded_file($tmp,"img/".$ten_hinh);
            echo "<h3>Upload thành công</h3>";
            echo "Name: " .$_FILES["ProductImg"]["name"]."<br>";
            echo "Type: " .$_FILES["ProductImg"]["type"]."<br>";
            echo "Size: " .($_FILES["ProductImg"]["size"]/1024)."Kb<br>";
            echo "Temp. Stored in: ".$_FILES["ProductImg"]["tmp_name"];
    }
    else echo "Vui lòng chọn file upload!";
        }
        echo"<br>";
        echo '<tr><td><img src="img/'.$ten_hinh.'"/></td>';
}
?>