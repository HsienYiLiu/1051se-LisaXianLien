<?php
session_start();
require("Api.php");
updateSell(intval($_POST['id']));
gainMoney($_SESSION['Id'],intval($_POST['id']));
header("Location: main.php");
?>
