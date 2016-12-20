<?php
session_start();
require("Api.php");
$Money=getMoney();
?>
<!DOCTYPE HTML>
<!-- 最新編譯和最佳化的 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- 選擇性佈景主題 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- 最新編譯和最佳化的 JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />
<title>Bread Factory</title>
<style type="text/css">
body {
font-family: 微軟正黑體;
font-size: 14pt;
color:black;
}
table tr td {
padding: 5px;
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
</head>
<body>
<div class="bg">
    <img class="demo" src="d.jpg" width="1000px" height="600px">
</div>
<div id="container">
<div id="header" align="right">
    <h1>MONEY : 
    <?php if ($Money) {
            while (	$rs=mysqli_fetch_assoc($Money)) {
                echo $rs['money'];
            }
        } else {
            echo "<tr><td>No data found!<td></tr>";
        }
    ?>&nbsp;&nbsp;<a href="shop.php">SHOP</a>&nbsp;<a href="bag.php">BAG</a></h1>
</div>
<br />
<hr />
<br />
<br />
<br />
<br />
<br />
<div id="content" >
    <input type="button" value="+">
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div id="rr" align="left">
    <input type="button" value="販賣" onclick="location.href='sell.php'">
    <input type="button" value="販賣" onclick="location.href='sell.php'">
    <input type="button" value="販賣" onclick="location.href='sell.php'">
    <br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吐司&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;波蘿麵包&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;法國麵包
</div>
</div>
</body>
</html>