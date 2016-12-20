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
.bg {
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
}
</style>
<div class="bg">
    <img class="demo" src="d.jpg" width="1380px" height="800px">
</div>
<br />
<div id="rr" align="left" >
<h1>&nbsp;&nbsp;&nbsp;BAG</h1>
</div>

<div id="aa" align="center">
<table class="rwd-table">
    <tr>
        <th>材料</th>
        <th>數量</th>
    </tr>
<?php
if ($back) {
    while ($rs=mysqli_fetch_assoc($back)) {
        echo  "<tr><td>{$rs['mname']}</td>";
        echo "<td>" , $rs['quantity'], "</td></tr>";
    }
} else {
    echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div id="bb" align="right" >
<input type="button" value="返回" onclick="location.href='main.php'">&nbsp;&nbsp;&nbsp;
</div>
</form>
</body>
</html>
