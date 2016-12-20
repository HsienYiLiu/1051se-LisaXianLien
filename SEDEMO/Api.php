<?php
require("dbconnect.php");
function getMsgList() {
    global $conn;
    $sql = "select * from game;";
    return mysqli_query($conn,$sql);
}
function updateTime($newD,$i) {
    global $conn;
    $sql = "update game set expire ='$newD' where id=$i";
    return mysqli_query($conn,$sql);
}
function getMoney() {
    global $conn;
    $sql = "select * from player where pid = 1;";
    return mysqli_query($conn,$sql);
}
function gainMoney($i) {
    global $conn;
    $sql = "UPDATE `player` SET `money`= money+30 WHERE `pid`= $i;";
    return mysqli_query($conn,$sql);
}
function updateMechine($i,$bid) {
    global $conn;
    $sql = "UPDATE `game` SET `bid`= $bid WHERE `id`= $i;";
    return mysqli_query($conn,$sql);
}
function getMeterial() {
    global $conn;
    $sql = "select * from material;";
    return mysqli_query($conn,$sql);
}
function updateMeterial($i,$money) {
    global $conn;
    $sql = "update material SET `mprice` = $money where `mid` = $i;";
    return mysqli_query($conn,$sql);
}
function getBackpage($i) {
    global $conn;
    $sql = "SELECT a.mname,c.quantity FROM material a LEFT JOIN minventory c ON a.mid = c.mid where pid = $i";
    return mysqli_query($conn,$sql);
}
function getBread() {
    global $conn;
    $sql = "SELECT bid,quantity FROM `bread`";
    return mysqli_query($conn,$sql);
}
function updateSell($i) {
    global $conn;
    $sql = "UPDATE `bread` SET `quantity`= quantity-1  WHERE  `bid` = $i";
    return mysqli_query($conn,$sql);
}

?>
