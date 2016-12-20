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
<!-- .bg {
position: fixed;
top: 0;
left: 0;
bottom: 0;
right: 0;
z-index: -999;
}
.bg img {
min-height: 100%;
min-width: 1000px;
width: 100%;
}
@media screen and (max-width: 1000px) {
    img.bg {
    left: 50%;
    margin-left: -500px;
    }
}
.demo
{
opacity:0.5;
filter:alpha(opacity=60);
} -->
div {
margin: 100px auto;
width: 800px;
padding: 50px 100px;
position:relative;
}
</style>
<!-- <div class="bg">
    <img class="demo" src="d.jpg" width="1380px" height="800px">
</div> -->
<div id="b" align="left" width="100px" height="50px">
<h1>SHOP</h1>
</div>
<div id="content" align="center" width="800px" height="600px">
<table class="rwd-table">
    <tr>
        <th>材料</th>
        <th>價錢</th>
    </tr>
<?php
$mertial1=rand(50,70);
$mertial2=rand(100,200);
$mertial3=rand(10,20);
updateMeterial(1,$mertial1);
updateMeterial(2,$mertial2);
updateMeterial(3,$mertial3);
if ($mertial) {
    while ($rs=mysqli_fetch_assoc($mertial)) {
        echo "<tr><td>{$rs['mname']}</td>";
        echo "<td>" , $rs['mprice'], "</td></tr>";
    }
} else {
    echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
</div>
<div id="aa" align="right" >
<input type="button" value="返回" onclick="location.href='main.html'">
</div>
</form>
</body>
</html>
