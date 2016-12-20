<?php
session_start();
require("Api.php");
updateSell(intval($_POST['id']));
//gainMoney($i)
header("Location: main.php");
?>