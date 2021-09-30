<!DOCTYPE html >
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="pheptinh.css">
    <head>
        <title>So hoc co ban</title>
    </head>
<body>
    <?php
        $so_a=0;
        $so_b=0;
        $kq=0;
            if(isset($_POST["so_a"]) && isset($_POST["so_b"]))
            {
                $so_a=$_POST["so_a"];
                $so_b=$_POST["so_b"];
                $pt=$_POST["tinh"];
            }
        
    ?>
<form id="form1" name="form1" method="post" action="ketqua.php">
    <table>
        <tr class="id1">
            <td colspan="2">
                <h2 class="style1">PHÉP TÍNH TRÊN 2 CHỮ SỐ</h2>
                <input type="radio" id="add1" name="tinh" value="Cộng" checked="checked">
                    <label for="add1">Cộng</label> &nbsp;&nbsp;
                <input type="radio" id="sub1" name="tinh" value="Trừ">
                    <label for="sub1">Trừ</label>  &nbsp;&nbsp;
                <input type="radio" id="mul1" name="tinh" value="Nhân">
                    <label for="mul1">Nhân</label> &nbsp;&nbsp;
                <input type="radio" id="div1" name="tinh" value="Chia">
                    <label for="div1">Chia</label> &nbsp;&nbsp;
                <br>
             </td>
        </tr>
        <tr>
            <td>
                <strong>Số a</strong>
            </td>
            <td>
                <label>
                    <input name="so_a" type="text" id="so_a" value="<?php echo $so_a;?>" />
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Số b </strong>
            </td>
            <td>
                <label>
                    <input name="so_b" type="text" id="so_b" value="<?php echo $so_b;?>"/>
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