 <?php
session_start();
require("Api.php");
$result=selectMechine();
?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js"></script>

<table width="200" border="1">
  <tr>
    <td>pid</td>
    <td>pwd</td>
    <td>money</td>
  </tr>
</table>
<script language="javascript">

function handleBomb(bombID) {
	now = new Date(); //get the current time
	tday = new Date(myArray[bombID]['expire'])
	console.log(now, tday)
	if (tday <= now) {
		//use jQuery ajax to reset timer
		$.ajax({
			url: "json.php",
			dataType: 'html',
			type: 'POST',
			data: { id: myArray[bombID]['id']}, //optional, you can send field1=10, field2='abc' to URL by this
      error: function(response) { //the call back function when ajax call fails
				 alert('Ajax request failed!');
			},
			success: function(txt) { //the call back function when ajax call succeed
        location.href = "gain.php";
        alert("Bomb" + bombID + ": " + txt)
				}
		});
	} else {
		alert("counting down, be patient.")
	}
}
function checkBomb() {
	now= new Date(); //get the current time
	//check each bomb with a for loop
	//array length: number of items in the global array: myArray
	for (i=0; i < myArray.length;i++) {
		tday=new Date(myArray[i]['expire']); //convert the date string into date object in javascript
		if (tday <= now) {
			//expired, set the explode image and text
			$("#bomb" + i).attr('src',"images/bread.png");
			$("#timer"+i).html("bread!");

		} else {
			//set the bomb image  and calculate count down
			$("#bomb" + i).attr('src',"images/waiting.jpg");
			$("#timer"+i).html(Math.floor((tday-now)/1000))
		}
	}
}

//javascript, to set the timer on windows load event
window.onload = function () {
	//check the bomb status every 1 second
    setInterval(function () {
		checkBomb()
    }, 1000);
};
</script>
</head>

<body >
<?php
$i=0;
$arr = array(); //define an array for bombs
while($row=mysqli_fetch_assoc($result)) {
	$expirew= $row['expire'];
	echo "<img src='images/waiting.jpg' id='bomb$i'>";
    //echo"<button type="button" class="btn btn-default">Right</button>";
  echo "<button onclick='handleBomb($i)'></button>";
  echo "<button onclick='handleBomb($i)'>法國麵包</button>";
  echo "<button onclick='handleBomb($i)'>甜甜圈</button>";
  echo "<div id='timer$i'>0</div>";
  $i++; //increase counter
}
?>
<script>
<?php
	//print the bomb array to the web page as a javascript object
	echo "var myArray=" . json_encode($arr);
?>
</script>
</body></html>
