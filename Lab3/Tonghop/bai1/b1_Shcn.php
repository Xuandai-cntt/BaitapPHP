<!DOCTYPE html>
<html>
<link rel="stylesheet" href="hcn.css">
<head>
    <title>Hinh chu nhat</title>
</head>
<body>
<?php
    $cd = $_POST["cd"];
    $cr = $_POST["cr"];
    if (isset($cd) && isset($cr)){
        if($cd>0 && $cr>0)
        {
            $chuvi = ($cd+$cr)*2;
            $dientich = $cd*$cr;
        }
}
?>
    <form action="b1_Shcn.php" method="post">
        <table>
            <tr class="id">
                <td colspan="2" style="color:red; font-size: 300%;">
                  Diện Tích HCN
                </td>
            </tr>
            <tr>
                <td>
                   Chieu dai:
                </td>
                <td>
                    <input type="number" placeholder="Vui long nhap so" name="cd" value="<?php echo $cd ?>">
                </td>
            </tr>
            <tr>
                <td>
                   Chieu rong:
                </td>
                <td>
                    <input type="number" placeholder="Vui long nhap so" name="cr" value="<?php echo $cr ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Chu vi:
                </td>
                <td>
                    <input type="number" name="chuvi" disabled="disabled" value="<?php echo $chuvi ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Diện Tích:
                </td>
                <td>
                    <input type="number" name="dientich" disabled="disabled" value="<?php echo $dientich ?>">
                </td>
            </tr>
            <tr class="id">
                <td colspan="2">
                    <button type="submit">Tính</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>