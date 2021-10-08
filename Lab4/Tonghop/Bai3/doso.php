<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <h1>XỔ SỐ KIẾN THIẾT</h1>
<?php
        if(isset($_POST['veso'])) {
                $veso=$_POST['veso'];
            }
                else $veso=0;
?>
<form action="bangso.php" method="post">
	Nhập vé số <input type="text" name="veso" value="<?php echo $veso?>"/>
	<input type="submit" name="submit" value="Dò số"/><br>
</form>
</body>
</html>