<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />
<?php
session_start();
require("Api.php");
$back =getBackpage(1);
?>
<title>Bread Factory</title>
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
　　 <th>數量</th>
　 </tr>
<?php
if ($back) {
	while (	$rs=mysqli_fetch_assoc($back)) {
		echo  "<tr><td>{$rs['quantity']}</td>";
		echo "<td>" , $rs['mname'], "</td></tr>";
	}
} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
<div id="aa" align="right" >
<input type="button" value="返回" onclick="location.href='main.html'">
</div>
</form>
</body>
</html>
