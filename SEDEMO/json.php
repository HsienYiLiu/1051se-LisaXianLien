<?php
session_start();
require("Api.php");
$newD = date("Y-m-d H:i:s",strtotime("+421 minutes"));
updateTime($newD ,intval($_POST['bombID']));
?>
