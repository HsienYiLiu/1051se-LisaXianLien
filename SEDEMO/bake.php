<?php
session_start();
require("Api.php");
minisBom(intval($_POST['bid']),1,$_SESSION['Id']);
minisBom(intval($_POST['bid']),2,$_SESSION['Id']);
minisBom(intval($_POST['bid']),3,$_SESSION['Id']);
bake(intval($_POST['bid']),intval($_POST['mechine']),$_SESSION['Id']);
header("Location: main.php");
?>
