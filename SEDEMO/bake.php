<?php
session_start();
require("Api.php");
$bag = openBag($_SESSION['Id']);
$bread = breadNeed(intval($_POST['bid']));
$i=0;
$item = array();
$Need = array();
if ($bag) {
	while (	$rs=mysqli_fetch_assoc($bag)) {
     $item[$i] = $rs['quantity'];
     $i++;
	}
} else {
	echo "<tr><td>No data found!<td></tr>";
}
$i=0;
if ($bread) {
	while (	$rs=mysqli_fetch_assoc($bread)) {
     $Need[$i] = $rs['quantity'];
     $i++;
	}
} else {
	echo "<tr><td>No data found!<td></tr>";
}
if($item[0] >= $Need[0] && $item[1] >= $Need[1]&& $item[2] >= $Need[2]){
  //$message = "成功";
  echo "true";
  minisBom(intval($_POST['bid']),1,$_SESSION['Id']);
  minisBom(intval($_POST['bid']),2,$_SESSION['Id']);
  minisBom(intval($_POST['bid']),3,$_SESSION['Id']);
  bake(intval($_POST['bid']),intval($_POST['mechine']),$_SESSION['Id']);
}else{
  $message = "false";
  echo "false";
  }
?>
