<?php
session_start();
require("dbconnect.php");
$_SESSION['Id'] = "";
$_SESSION['pwd'] = "";
$user = $_POST['id'];
$passWord = $_POST['pwd'];
$sql = "SELECT * FROM player WHERE id='" . $user . "' AND pwd= '" . $passWord . "'";
mysqli_query($conn,$sql) or die("Query Fail! ".mysqli_error($conn));
mysqli_set_charset($conn, 'utf8');
mysqli_select_db($conn, $db); //選擇資料庫
    if ($result = mysqli_query($conn,$sql)) {
        if ($row=mysqli_fetch_array($result)) {
            $_SESSION['Id'] = $_POST['id'];
            header("Refresh:0.5; url=main.php?_SESSION['Id']");
            exit(0);
        }
        else {
            echo "Invalid Username or Password - Please try again <br />";
            header("Refresh:0.5; url=index.php");
        }
    }
?>
