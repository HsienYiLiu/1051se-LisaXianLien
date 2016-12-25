<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />
<title>Shop</title>
<?php
session_start();
require("Api.php");
$mertial=getMeterial();
?>
<style type="text/css">
body {
font-family: 微軟正黑體;
font-size: 14pt;
}
table tr td {
padding: 10px;
}
div {
margin: 100px auto;
width: 800px;
padding: 50px 100px;
position:relative;
}
</style>

<table class="rwd-table">
　 <tr>
　　 <th>材料</th>
　　 <th>價錢</th>
		<th>購買</th>
　 </tr>
<?php
$mertial1=rand(50,70);
$mertial2=rand(100,200);
$mertial3=rand(10,20);
updateMeterial(1,$mertial1);
updateMeterial(2,$mertial2);
updateMeterial(3,$mertial3);
if ($mertial) {
	echo "<form action='buy.php' method='post'>";

	while (	$rs=mysqli_fetch_assoc($mertial)) {
		echo "<tr><td>{$rs['mname']}</td>";
		echo "<td>" , $rs['mprice'], "</td>";
		echo "<td><input type='text' name='{$rs['mid']}'></tr>";

	}
	echo "<td><input type = 'submit'>";
	echo "</form>";

} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
<div id="aa" align="right" >
<input type ="button" onclick="history.back()" value="回到上一頁"></input>
</div>
</form>
</body>
</html>
