<?php
require("dbconnect.php");
function getMsgList() {
    global $conn;
    $sql = "select * from game;";
    return mysqli_query($conn,$sql);
}
  function selectMechine() {
    global $conn;
    $sql = "select * from machine;";
    return mysqli_query($conn,$sql);
}
function updateTime($newD,$i) {
    global $conn;
    $sql = "update game set expire ='$newD' where id=$i";
    return mysqli_query($conn,$sql);
}
function getMoney($pid) {
    global $conn;
    $sql = "select * from player where pid = $pid;";
    return mysqli_query($conn,$sql);
}
function gainMoney($i,$bid) {
    global $conn;
    $sql = "UPDATE `player` SET `money`= money + (select bprice from bread where bid = $bid) WHERE `pid`= $i";
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
function MechineMoney($i) {
    global $conn;
    $sql = "UPDATE `player` SET `money`= money -1000,`mnuber` = `mnuber`+1 WHERE `pid`= $i";
    return mysqli_query($conn,$sql);
}
function insertMechine($mechine,$i,$status,$bid){
  global $conn;
  $sql = "INSERT INTO `machine`(`Mechid`, `pid`, `Mprice`, `status`, `bid`) VALUES ($mechine,$i,1000,$status,$bid)";
  return mysqli_query($conn,$sql);
}
function bake($status,$mechine,$id){
  global $conn;
  $sql = "UPDATE `machine` SET `status`= $status,`bid`= $status WHERE `Mechid`= $mechine and `pid` = $id";
  return mysqli_query($conn,$sql);
}
function minisBom($bid,$mid,$i){
  global $conn;
  $sql = "UPDATE minventory set quantity = quantity -(SELECT quantity FROM `bom` WHERE bid = $bid and mid = $mid) where mid = $mid and pid = $i";
  return mysqli_query($conn,$sql);
}
?>
