<?php
session_start();
require("Api.php");
$money =getMoney();
$bread =getBread();
echo $_SESSION['Id'];
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
<script language="javascript">
function Sell(bid,quantity) {
  console.log(bid,quantity);
	if (quantity > 0) {
		//use jQuery ajax to reset timer
		$.ajax({
			url: "sell.php",
			dataType: 'html',
			type: 'POST',
			data: { id: bid }, //optional, you can send field1=10, field2='abc' to URL by this
      error: function(response) { //the call back function when ajax call fails
				 alert('Ajax request failed!');
			},
			success: function(txt) { //the call back function when ajax call succeed
          location.href = "main.php";
				}
		});
	} else {
		alert("沒麵包囉~")
	}
}
</script>

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
    <?php if ($money) {
            while (	$rs=mysqli_fetch_assoc($money)) {
                echo $rs['money'];
            }
        } else {
            echo "<tr><td>No data found!<td></tr>";
        }
    ?>&nbsp;&nbsp;<a href="shop.php">SHOP</a>&nbsp;<a href="bag.php">BAG</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
</div>
<hr />
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
<div id="rr" align="left" >
<?php
$i=0;
$list=array();
if ($bread) {
	while (	$rs=mysqli_fetch_assoc($bread)) {
    $list[$i]=$rs['quantity'];
    $i++;
  }
    echo "<button type=\"button\" onclick =\"Sell(1,$list[0])\">";
    echo "<div><td width=\"30%\">販賣</td></div>";
    echo "吐司*";
    echo $list[0];
    echo " <button type=\"button\" onclick =\"Sell(2,$list[1])\">";
    echo "<div><td width=\"30%\">販賣</td></div>";
    echo "法國麵包*";
    echo $list[1];
    echo "<button type=\"button\" onclick =\"Sell(3,$list[2])\">";
    echo "<div><td width=\"30%\">販賣</td></div>";
    echo "波蘿麵包*";
    echo $list[2];
} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
</div>
<script>
</script>
<!-- <div id="rr" align="right">
    <input type="button" value="販賣" onclick="location.href='sell.php'">
    <input type="button" value="販賣" onclick="location.href='sell.php'">
    <input type="button" value="販賣" onclick="location.href='sell.php'">
    <br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吐司&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;波蘿麵包&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;法國麵包&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div> -->
</div>
</body>
</html>