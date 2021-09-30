<b>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</b>
<br>
<?php
    if(isset($_POST["submit"])){
        $name=$_POST["name"];
    echo "Họ tên: $name<br>";
        $diachi=$_POST["diachi"];
    echo "Địa chỉ: $diachi<br>";
        $sdt=$_POST["sdt"];
    echo "Số điện thoại: $sdt<br>";
        $gt=$_POST["gioitinh"];
            if($gt=="nam"){
                echo "Giới tính: Nam";
            }
            else echo "Giới tính: Nữ";
    echo "<br>";
        $world=$_POST["world"];
            if($world=="vn"){
                echo "Quốc tịch: Việt Nam";
            }
            else echo "Quốc tịch: Trung Quốc";
    echo "<br>";
        echo "Môn học: ";
        $php= isset($_POST["php"]);
        if($php) echo "PHP & MYSQL &nbsp;&nbsp;";
        $c= isset($_POST["c#"]); 
        if($c) echo "C# &nbsp;&nbsp;";  
        $xml= isset($_POST["xml"]);
        if($xml) echo "XML &nbsp;&nbsp;";   
        $python= isset($_POST["python"]);
        if($python) echo"Python &nbsp;&nbsp;";
    echo "<br>";
        $ghichu=$_POST["comment"];
        echo "Ghi chú: $ghichu";
    }
?>
<br>
<a href="javascript:window.history.back(-1);">Quay lại trang trước</a>