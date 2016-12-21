<?php
session_start();
require("Api.php");
$i=(int)$_POST['id'];
$newD = date("Y-m-d H:i:s",strtotime("+421 minutes"));
$time=updateTime($newD,$i);
echo $time.$newD ;
?>