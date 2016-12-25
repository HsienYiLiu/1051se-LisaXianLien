<?php
session_start();
require("Api.php");
echo $_POST['bombID'];
plusSell(intval($_POST['bombID']));
?>
