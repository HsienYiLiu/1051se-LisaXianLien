<?php
session_start();
require("Api.php");
gainMoney();
header("Location: bomb.php");
?>
