<!DOCTYPE html >
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="Bai2.css">
    <head>
        <title>Tính Tiền Điện </title>
    </head>
<body>
<?php

    $ketqua = 0;
    $mang = "";
    $str="";
    if(isset($_POST["tinh"])){

        $mang = explode(",", $_POST["mang"]);
        $n = count($mang);
        $ketqua =array_sum($mang);
}
        $string= implode(",",$mang);
?>
<form method="POST" action="Bai2.php">
<table>
    <thead>
        <tr>
            <th colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nhập dãy số:</td>
            <td>
                <input type="text" name="mang" value="<?php echo $string;?>">
            </td>
        </tr>
        <tr>
            <td>
            </td>
         <td><input type="submit" name="tinh" value="Tổng dãy số" ></td>
        </tr>
        <tr>
            <td>Tổng dãy số:</td>
            <td><input type="text" name="ketqua" disabled="disabled" value="<?php echo $ketqua ?>" ></td>
        </tr>
    </tbody>
</table>
</form>
</body>
</html>