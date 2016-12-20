<?php
session_start();
require("Api.php");
$money =getMoney();
$bread =getBread();
echo $_SESSION['Id'];
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js"></script>
<!-- 最新編譯和最佳化的 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- 選擇性佈景主題 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- 最新編譯和最佳化的 JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
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
<html>
    <head>
        <title>Bread factory</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body>
<!-- Header -->
            <header id="header">
                <div class="inner">
                    <a  class="logo"><strong>PLAYER</strong></a>
                        <nav id="nav">
                          <?php
                          if ($money) {
                          while (	$rs=mysqli_fetch_assoc($money)) {
                            echo $rs['money'];
                          }
                          } else {
                          echo "<tr><td>No data found!<td></tr>";
                          }
                          ?>
                        <a href="shop.php">SHOP</a>
                        <a href="bag.php">BAG</a>
                    </nav>
                    <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
                </div>
            </header>
<!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <div class="flex ">
                        <div>
                            <button type="button">
                            <h3>+</h3>
                            <p></p>
                        </div>
                        <div>
                        </div>
                        <div>
                      </div>
                    </div>
				</div>
</section>

<?php
$i=0;
$list=array();
if ($bread) {
	while (	$rs=mysqli_fetch_assoc($bread)) {
    $list[$i]=$rs['quantity'];
    $i++;
  }
    echo "<button type=\"button\" onclick =\"Sell(1,$list[0])\">";
    echo "<div><td width=\"33%\">吐司</td></div>";
    echo $list[0];
    echo " <button type=\"button\" onclick =\"Sell(2,$list[1])\">";
    echo "<div><td width=\"33%\">法國麵包</td></div>";
    echo $list[1];
    echo "<button type=\"button\" onclick =\"Sell(3,$list[2])\">";
    echo "<div><td width=\"33%\">波蘿麵包</td></div>";
    echo $list[2];

} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
<script>

</script>
</body>
</html>
