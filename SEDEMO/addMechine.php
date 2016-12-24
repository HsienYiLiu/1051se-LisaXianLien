<?php
session_start();
require("Api.php");
MechineMoney(intval($_POST['id']));
header("Location: main.php");
?>
