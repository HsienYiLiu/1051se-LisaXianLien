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
function gainMoney() {
    global $conn;
    $sql = "UPDATE `player` SET `money`= money+30 WHERE `pid`= 123;";
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
    $sql = "SELECT c.quantity,a.mname FROM material a LEFT JOIN minventory c ON a.mid = c.mid where pid = $i";
    return mysqli_query($conn,$sql);
}

/*
function push($mid) {
    global $conn;
    $sql = "update guestbook set push = push+1 where id = $mid;";
    return mysqli_query($conn,$sql);
}

function addMsg($title, $msg, $name) {
    global $conn;
    $title=mysqli_real_escape_string($conn,$title);
    $msg=mysqli_real_escape_string($conn,$msg);
    $name=mysqli_real_escape_string($conn,$name);
    if ($title) { //if title is not empty
        $sql = "insert into guestbook (title, msg, name) values ('$title', '$msg','$name');";
        return mysqli_query($conn, $sql);
    } else {
        return false;
    }
}

function delMsg($msgID) {
    global $conn;
    $sql = "delete from guestbook where id=$msgID;";
    return mysqli_query($conn,$sql);
}*/



?>
