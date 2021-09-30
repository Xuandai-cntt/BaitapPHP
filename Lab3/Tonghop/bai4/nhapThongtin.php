<!DOCTYPE html>
<html>
<link rel="stylesheet" href="thongtin.css">
<body>
<form action="xuatThongtin.php" method="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-title">
                   Enter your information
                </div>
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form>
                            <div class="form-group">
                            <p>Họ tên: <input type="text" name="name" /></p>
                            <p>Địa chỉ:  <input type="text" name="diachi" /></p>
                            <p>Số điện thoại:  <input type="text" name="sdt" /></p>
                            <p>Giới tính:
                                <input type="radio" name="gioitinh" value="nam">Nam
                                <input type="radio" name="gioitinh" value="nu">Nữ
                            </p>
                            <p>Quốc tịch:  
                            <select name="world">
                                        <option value="">Chọn Quốc Gia</option>
                                        <option <?php if (isset($world) && $world == 'vn') echo "selected=\"selected\"";  ?> value="vn" >Việt Nam</option>
                                        <option <?php if (isset($world) && $world == 'tq') echo "selected=\"selected\"";  ?> value="tq">Trung Quốc</option>
                                    </select>
                            </p>
                            <p>Các môn đã học:  
                                <input type="checkbox" name="php" value="php">PHP & MYSQL
                                <input type="checkbox" name="c#" value="c#">C#
                                <input type="checkbox" name="xml" value="xml">XML
                                <input type="checkbox" name="python" value="python">Python
                            </p>
                            <div>
                            <p>Ghi chú:</p>
                            <textarea name="comment" rows="5" cols="40"></textarea>
                        </div>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-button">
                                <input type="submit" name="submit" class="btn btn-outline-primary" value="Gửi đi" />
                                </div>
                                 <div class="col-lg-6 login-btm login-button">
                                <input type="reset" name="submit" class="btn btn-outline-primary" value="Hủy" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </form>
</body>
</html>