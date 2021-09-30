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
                if($pt=="Cộng"){
                    $kq=$so_a+$so_b;
                }
                else if($pt=="Trừ"){
                    $kq=$so_a-$so_b;
                }
                else if($pt=="Nhân"){
                    $kq=$so_a*$so_b;
                }
                else if($pt=="Chia"){
                    if($so_b != 0){
                    $kq=$so_a/$so_b;
                    }
                    else $kq="Không thực hiện được";
                }
            }
        
    ?>
<form id="form1" name="form1" method="post" action="pheptinh.php">
    <table>
        <tr class="id1">
            <td colspan="2">
                <h2 class="style1">PHÉP TÍNH TRÊN 2 CHỮ SỐ</h2>
             </td>
        </tr>
        <tr>
            <td>
         <strong>Phép tính:</strong> 
                    <?php
                    echo $pt;
                ?>
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
        <tr>
            <td>
                <strong>Kết quả </strong>
            </td>
            <td>
                <label>
                    <input name="kq" type="text" id="kq" disabled="disabled" value="<?php echo $kq;?>"/>
                </label>
            </td>
        </tr>
        <tr class="id">
            <td colspan="2">
            <a href="javascript:window.history.back(-1);">Quay lại trang trước</a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>