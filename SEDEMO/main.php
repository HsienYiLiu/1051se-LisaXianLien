<!DOCTYPE html>
<?php
session_start();
require("Api.php");
$money =getMoney($_SESSION['Id']);
$bread =getBread();
$mdetail = selectMechine()
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
                            $nowMechine = $rs['mnuber'];
                            $nowMoney = $rs['money'];
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
                          <input type="button" id="btnAdd" value="Add Merchine">
                          <p id="fooBar" ></p>
                          <div id="displayBox"></div>
                          <script language="javascript">
                          var element ;
                          <?php
                          $i=0;
                          $status=array();
                          if ($mdetail) {
                            while (	$rs=mysqli_fetch_assoc($mdetail)) {
                              $status[$i] = $rs['status'];
                              $i++;
                            }
                          } else {
                          echo "<tr><td>No data found!<td></tr>";
                          }
                          ?>
                          var mechine = "<?php echo $nowMechine;?>";
                          var value = "<?php echo $nowMoney;?>";
                          add();
                          var status0 = "<?php echo $status[0];?>"
                          var status1 = "<?php echo $status[1];?>"
                          var status2 = "<?php echo $status[2];?>"
                          var status3 = "<?php echo $status[3];?>"
                          var status = [status0,status1,status2,status3];
                          for(var i = 0 ; i < mechine ; i++){
                              if(status[i] != 0){
                                  document.getElementById("btn_id"+i).setAttribute("disabled","disabled");
                              }
                          }
                          //選擇要考的麵包種類

                          function createRadioButton() {
                            var foo = document.getElementById("fooBar");
                            // Create radio button object with value="First Choice" and then insert this element into the document hierarchy.
                            var newRadioButton1 = document.createElement('input');
                            newRadioButton1.setAttribute('type', 'button');
                            newRadioButton1.setAttribute('name', 'button1');
                            newRadioButton1.setAttribute('value', '吐司');
                            //document.body.insertBefore(newRadioButton); // Since the second argument is implicity null, this inserts the radio button at the end of this node's list of children ("this" node refers to the body element).
                            // Create radio button object with value="Second Choice" and then insert this element into the document hierarchy.
                            var newRadioButton2 = document.createElement('input');
                            newRadioButton2.setAttribute('type', 'button');
                            newRadioButton2.setAttribute('name', 'button2');
                            newRadioButton2.setAttribute('value', '法國麵包');
                            //document.body.insertBefore(newRadioButton); // Insert the radio button at the end of this node's list of children (which is directly after the radio button we just inserted).
                            var newRadioButton3 = document.createElement('input');
                            newRadioButton3.setAttribute('type', 'button');
                            newRadioButton3.setAttribute('name', 'button3');
                            newRadioButton3.setAttribute('value', '波羅麵包');
                            //document.body.insertBefore(newRadioButton);
                            var br = document.createElement('br');
                            foo.appendChild(br);
                            foo.appendChild(newRadioButton1);
                            foo.appendChild(newRadioButton2);
                            foo.appendChild(newRadioButton3);
                            newRadioButton1.onclick = function() { // Note this is a function
                                //document.getElementById('btn_id0').setAttribute("disabled","disabled");
                                
                            };
                            newRadioButton2.onclick = function() { // Note this is a function
                                alert("烤麵包2");
                            };
                            newRadioButton3.onclick = function() { // Note this is a function
                                alert("烤麵包3");
                            };
                          }
                          //讀入當前使用者有幾台機器


                          //麵包機扣錢
                          function Mechine(bid) {
                          	if (mechine < 4) {
                          		//use jQuery ajax to reset timer
                          		$.ajax({
                          			url: "addMechine.php",
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
                          		alert("機器太多~")
                          	}
                          }
                          //產生麵包機按鈕
                          function add() {
                            //Create an input type dynamically.
                            for(var i = 0 ; i < mechine ; i++){
                              element = document.createElement("button");
                              element.setAttribute("id", "btn_id"+i);
                              element.setAttribute("class", "btn_class"+i);
                              element.setAttribute("width", "250px");
                              //element.setAttribute("data-comma-delimited-array", "one,two,three,four");
                              element.setAttribute("anything-random", document.getElementsByTagName("img").length);
                              /*element.onclick = function() { // Note this is a function
                                  createRadioButton();
                              };*/
                              var t = document.createTextNode("Bake Bread");
                              var foo = document.getElementById("fooBar");
                              //Append the element in page (in span).
                              element.appendChild(t);
                              foo.appendChild(element);
                            }
                          }
                          document.getElementById("btnAdd").onclick = function() {
                                Mechine(1) ;
                          }
                          document.getElementById("btn_id0").onclick = function() {
                                createRadioButton(0);
                          }
                          document.getElementById("btn_id1").onclick = function() {
                                createRadioButton(1);
                          }
                          document.getElementById("btn_id2").onclick = function() {
                                createRadioButton(2);
                          }
                          document.getElementById("btn_id3").onclick = function() {
                                createRadioButton(3);
                          }

                            </script>

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
