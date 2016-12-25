<!DOCTYPE html>
<?php
session_start();
require("Api.php");
$money = getMoney($_SESSION['Id']);
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
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<title>Bread factory</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<!-- Header -->
    <header id="header">
        <div class="inner">
            <div class="bg">
                <img class="demo" src="./images/d.jpg" width="50px" height="50px" >
            </div>
            <a  class="logo"><strong>PLAYER</strong></a>
            <nav id="nav">
            <?php
            if ($money) {
                while ( $rs=mysqli_fetch_assoc($money)) {
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
                <p id="fooBar2"></p>
                <div id="displayBox"></div>
                <script language="javascript">
                /*
                檢查機器目前狀況
                */
                <?php
                    $i=0;
                    $status=array();
                    if ($mdetail) {
                        while ( $rs=mysqli_fetch_assoc($mdetail)) {
                            $status[$i] = $rs['status'];
                            $i++;
                        }
                    } else {
                        echo "<tr><td>No data found!<td></tr>";
                    }
                    $i=0;
                    $time=array();
                    $list=array();
                    if ($bread) {
                        while ( $rs=mysqli_fetch_assoc($bread)) {
                            $time[$i] = $rs['time'];
                            $list[$i]=$rs['quantity'];
                            $i++;
                        }
                    } else {
                        echo "<tr><td>No data found!<td></tr>";
                    }
                ?>
                var mechine = "<?php echo $nowMechine;?>";
                var value = "<?php echo $nowMoney;?>";
                add();
                var time =["<?php echo $time[0];?>","<?php echo $time[1];?>","<?php echo $time[2];?>"];
                var status0 = "<?php echo $status[0];?>"
                var status1 = "<?php echo $status[1];?>"
                var status2 = "<?php echo $status[2];?>"
                var status3 = "<?php echo $status[3];?>"
                var status = [status0,status1,status2,status3];
                var usetime= [status0,status1,status2,status3];

                function Bake(bid,mechine) {
                    if (bid != 0) {
                        //use jQuery ajax to reset timer
                        $.ajax({
                            url: "bake.php",
                            dataType: 'html',
                            type: 'POST',
                            data: {
                                bid: bid,
                                mechine : mechine
                            }, //optional, you can send field1=10, field2='abc' to URL by this
                      		error: function(response) { //the call back function when ajax call fails
                                 alert('Ajax request failed!');
                            },
                            success: function(txt) { //the call back function when ajax call succeed
                          //location.href = "main.php";
                                    console.log("txt"+txt);
                                    if(txt == true)
                                        need = true;
                                    else if(txt == false){
                                        need = false;
                                    }
                                }
                        });
                    } else {
                        alert("沒材料囉~")
                    }
                }
                function gain(bombID) {
                    if (bombID) {
                        //use jQuery ajax to reset timer
                        $.ajax({
                            url: "gain.php",
                            dataType: 'html',
                            type: 'POST',
                            data: {
                                bombID: bombID,
                            }, //optional, you can send field1=10, field2='abc' to URL by this
                            error: function(response) { //the call back function when ajax call fails
                                        alert('Ajax request failed!');
                            },
                            success: function(txt) { //the call back function when ajax call succeed
                                    //alert(txt);
                                }
                        });
                    } else {
                        alert("counting down, be patient.")
                    }
                }
                /*
                動態產生不同的麵包製作按鈕
                */
                function createRadioButton(mechine) {
                    var foo = document.getElementById("fooBar");
                    var foo2 = document.getElementById("fooBar2");
                    var newRadioButton1 = document.createElement('input');
                    newRadioButton1.setAttribute('type', 'button');
                    newRadioButton1.setAttribute('name', 'button1');
                    newRadioButton1.setAttribute('value', '吐司');
                    newRadioButton1.setAttribute('id', 'bread0');
                    var newRadioButton2 = document.createElement('input');
                    newRadioButton2.setAttribute('type', 'button');
                    newRadioButton2.setAttribute('name', 'button2');
                    newRadioButton2.setAttribute('value', '法國麵包');
                    newRadioButton2.setAttribute('id', 'bread1');
                    var newRadioButton3 = document.createElement('input');
                    newRadioButton3.setAttribute('type', 'button');
                    newRadioButton3.setAttribute('name', 'button3');
                    newRadioButton3.setAttribute('value', '波羅麵包');
                    newRadioButton3.setAttribute('id', 'bread2');
                    //document.body.insertBefore(newRadioButton);
                    var br = document.createElement('br');
                    foo2.innerHTML = "";
                    foo2.appendChild(br);
                    foo2.appendChild(newRadioButton1);
                    foo2.appendChild(newRadioButton2);
                    foo2.appendChild(newRadioButton3);
                    newRadioButton1.onclick = function() { // Note this is a function
                        //document.getElementById('btn_id0').setAttribute("disabled","disabled");
                        var breadid=this.id.substring(5,6);
                        //console.log(breadid);
                        foo2.innerHTML = "";
                        if(mechine == 0){
                                Bake(1,0);
                                usetime[0] =  time[breadid];
                                countdown1(0);

                        }else if(mechine == 1){
                                Bake(1,1);
                                usetime[1] =  time[breadid];
                                countdown1(1);

                        }else if(mechine == 2){
                              Bake(1,2);
                                usetime[2] =  time[breadid];
                                countdown1(2);
                                //handleBomb(3);
                        }else{
                                Bake(1,3);
                                usetime[3] =  time[breadid];
                                countdown1(3);
                        }
                    };
                    newRadioButton2.onclick = function() { // Note this is a function
                        var breadid=this.id.substring(5,6);
                        if(mechine == 0){
                                Bake(2,0);
                                usetime[0] =  time[breadid];
                                countdown2(0);
                        }else if(mechine == 1){

                                Bake(2,1);
                                usetime[1] =  time[breadid];
                                countdown2(1);
                        }else if(mechine == 2){
                                Bake(2,2);
                                usetime[2] =  time[breadid];
                                countdown2(2);
                        }else{
                                Bake(2,3);
                                usetime[3] =  time[breadid];
                                countdown2(3);
                        }
                    };
                    newRadioButton3.onclick = function() { // Note this is a function
                        var breadid=this.id.substring(5,6);
                            if(mechine == 0){
                                    Bake(3,0);
                                    usetime[0] =  time[breadid];
                                    countdown3(0);
                            }else if(mechine == 1){
                                    Bake(3,1);
                                    usetime[1] =  time[breadid];
                                    countdown3(1);
                            }else if(mechine == 2){
                                    Bake(3,2);
                                    usetime[2] =  time[breadid];
                                    countdown3(2);
                            }else{
                                    Bake(3,3);
                                    usetime[3] =  time[breadid];
                                    countdown3(3);
                            }
                        };
                    }

                    /*
                    動態產生麵包機按鈕
                    */
                    function add() {
                        //Create an input type dynamically.
                        for(var i = 0 ; i < mechine ; i++){
                          element = document.createElement("button");
                          element.setAttribute("id", "btn_id"+i);
                          element.setAttribute("class", "btn_class"+i);
                          element.setAttribute("value", "value"+i);
                          element.setAttribute("width", "250px");
                          var t = document.createTextNode("Bake Bread");
                          var foo = document.getElementById("fooBar");
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
										/*
										產生麵包機
										*/
										function Mechine(bid) {
												if (mechine < 4 && value > 1000) {
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
		                //選擇要考的麵包種類
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
                    function countdown1(k){
                        //k 機器,存時間
                        document.getElementById("btn_id"+k).disabled=true;
                        console.log("");
                        if(usetime[k]==0){
                            gain(1);
                            document.getElementById("btn_id"+k).disabled=false;
                            document.getElementById("btn_id"+k).innerHTML = "bake~";
                        }else{
                            if(k == 0){;
                                var t   = document.getElementById("btn_id0").innerHTML = usetime[k] + " sec...";
                                $("#btn_id"+k).html(t);
                            }else if(k == 1){
                                var t   = document.getElementById("btn_id1").innerHTML = usetime[k] + " sec...";
                                $("#btn_id"+k).html(t);
                            }else if(k == 2){
                                var t   = document.getElementById("btn_id2").innerHTML = usetime[k] + " sec...";
                                $("#btn_id"+k).html(t);
                            }else if(k == 3 ){
                                var t   = document.getElementById("btn_id3").innerHTML = usetime[k] + " sec...";
                                $("#btn_id"+k).html(t);
                            }
                            setTimeout("countdown1('"+k+"')",1000);
                            usetime[k]-=1;
                        }

                    }
                    function countdown2(k){
                        //k 機器,存時間
                        document.getElementById("btn_id"+k).disabled=true;
                        console.log("");

                        if(usetime[k]==0){
                                        gain(2);
                                        document.getElementById("btn_id"+k).disabled=false;
                                        document.getElementById("btn_id"+k).innerHTML = "bake~";
                        }else{
                                if(k == 0){;
                                    var t   = document.getElementById("btn_id0").innerHTML = usetime[k] + " sec...";
                                    $("#btn_id"+k).html(t);
                                }else if(k == 1){
                                    var t   = document.getElementById("btn_id1").innerHTML = usetime[k] + " sec...";
                                    $("#btn_id"+k).html(t);
                                }else if(k == 2){
                                    var t   = document.getElementById("btn_id2").innerHTML = usetime[k] + " sec...";
                                    $("#btn_id"+k).html(t);
                                }else if(k == 3 ){
                                    var t   = document.getElementById("btn_id3").innerHTML = usetime[k] + " sec...";
                                    $("#btn_id"+k).html(t);
                                }
                            setTimeout("countdown2('"+k+"')",1000);
                            usetime[k]-=1;
                        }

                    }
                    function countdown3(k){
                        //k 機器,存時間
                        document.getElementById("btn_id"+k).disabled=true;
                        console.log("");

                        if(usetime[k]==0){
                            gain(3);
                            document.getElementById("btn_id"+k).disabled=false;
                            document.getElementById("btn_id"+k).innerHTML = "bake~";
                        }else{
                                if(k == 0){;
                                    var t   = document.getElementById("btn_id0").innerHTML = usetime[k] + " sec...";
                                    $("#btn_id"+k).html(t);
                                }else if(k == 1){
                                    var t   = document.getElementById("btn_id1").innerHTML = usetime[k] + " sec...";
                                    $("#btn_id"+k).html(t);
                                }else if(k == 2){
                                    var t   = document.getElementById("btn_id2").innerHTML = usetime[k] + " sec...";
                                    $("#btn_id"+k).html(t);
                                }else if(k == 3 ){
                                    var t   = document.getElementById("btn_id3").innerHTML = usetime[k] + " sec...";
                                    $("#btn_id"+k).html(t);
                                }
                            setTimeout("countdown3('"+k+"')",1000);
                            usetime[k]-=1;
                        }
                    }
                </script>
            </div>
        </div>
        <div class='sell .col-xs-12 .col-sm-6 .col-lg-8'>
        <?php
            echo "<button type=\"button\" onclick =\"Sell(1,$list[0])\">";
            echo "<div><td width=\"33%\">吐司</td></div>";
            echo $list[0];
            echo " <button type=\"button\" onclick =\"Sell(2,$list[1])\">";
            echo "<div><td width=\"33%\">法國麵包</td></div>";
            echo $list[1];
            echo "<button type=\"button\" onclick =\"Sell(3,$list[2])\">";
            echo "<div><td width=\"33%\">波蘿麵包</td></div>";
            echo $list[2];
        ?>
        </div >
    </section>
</body>
</html>
