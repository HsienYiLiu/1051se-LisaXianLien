<?php
session_start();
require("Api.php");
$mertial=getMeterial();
$money = getMoney($_SESSION['Id']);
$i=0;
$nowMoney = 0;
$price=array();
if ($mertial) {
	while (	$rs=mysqli_fetch_assoc($mertial)) {
     $price[$i] = $rs['mprice'];
     $i++;
	}
} else {
	echo "<tr><td>No data found!<td></tr>";
}
if ($money) {
while (	$rs=mysqli_fetch_assoc($money)) {
  $nowMoney = $rs['money'];
  echo $nowMoney;
}
} else {
echo "<tr><td>No data found!<td></tr>";
}

if(($price[0]*$_POST[1] +$price[1]*$_POST[2]+$price[2]*$_POST[3]) <= $nowMoney && $_POST[1] !=NULL  && $_POST[2] !=NULL  && $_POST[3] !=NULL){
  buyMaterial($_SESSION['Id'],1,$_POST[1]);
  buyMaterial($_SESSION['Id'],2,$_POST[2]);
  buyMaterial($_SESSION['Id'],3,$_POST[3]);
  $message = "成功";
  //echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<script>alert('$message'); location.href = 'shop.php';</script>";
}else{
  $message = "錢不夠失敗or輸入錯誤";
  echo "<script>alert('$message'); location.href = 'shop.php';</script>";
}
//header("Location: shop.php");
?>
