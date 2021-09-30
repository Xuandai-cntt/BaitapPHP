<!DOCTYPE html >
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="tiendien.css">
    <head>
        <title>Tính Tiền Điện </title>
    </head>
<body>
    <?php
        $tenchuho="Dai";
        $socu=0;
        $somoi=0;
        $dongia=20000;
        $thanhtien=0;
            if(isset($_POST["tenchuho"]) && is_numeric($_POST["socu"]) && is_numeric($_POST["somoi"]))
            {
                $tenchuho=$_POST["tenchuho"];
                $socu=$_POST["socu"];
                $somoi=$_POST["somoi"];
                $dongia=$_POST["dongia"];
                $thanhtien=($somoi-$socu)*$dongia;
            }
    ?>
<form id="form1" name="form1" method="post" action="tiendien.php">
    <table>
        <tr class="id1">
            <td colspan="2">
                <h2 class="style1">Thanh Toán Tiền Điện </h2>
             </td>
        </tr>
        <tr>
            <td width="140">
                <strong>Tên Chủ Hộ </strong>
            </td>
            <td width="240">
                <label>
                     <input name="tenchuho" type="text" id="tenchuho" value="<?php echo $tenchuho;?>" />
              </label>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Chỉ Số Cũ </strong>
            </td>
            <td>
                <label>
                    <input name="socu" type="text" id="socu" value="<?php echo $socu;?>" />(Kw)
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Chỉ Số Mới </strong>
            </td>
            <td>
                <label>
                    <input name="somoi" type="text" id="somoi" value="<?php echo $somoi;?>"/>(Kw)
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Đơn Giá </strong>
            </td>
            <td>
                <label>
                    <input name="dongia" type="text" id="dongia" value="<?php echo $dongia?>" />(VNĐ)
                </label>
             </td>
        </tr>
        <tr>
            <td>
                <strong>Số Tiền Thanh Toán </strong>
            </td>
            <td>
                <label>
                    <input name="thanhtien" type="text" id="thanhtien" disabled="disabled" value="<?php echo $thanhtien;?>"/>(VNĐ)
                </label>
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