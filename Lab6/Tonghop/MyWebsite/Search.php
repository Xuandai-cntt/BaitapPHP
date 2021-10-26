
<?php
	// Ket noi CSDL
include ('includes/header.html');
include("includes/connect.php");
?>
<style>
#timkiem a:link, a:visited {
  background-color:darkseagreen;
  color: black;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

#timkiem a:hover, a:active {
  background-color: red;
}
</style>
<div id="timkiem" style="margin-top: 20px; text-align:center;">
	<ul>
		<a href="TKtheoTen.php">Tìm theo tên</a>
		<a href="TKtheoLoai.php" >Tìm theo loại</a>
		<a href="TKtheoPB.php" >Tìm theo phòng ban</a>
	</ul>
</div>
<?php
include ('includes/footer.html');
?>