<?php
session_start();
require("Api.php");
$mertial=getMeterial();
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js"></script>
<input type ="button" onclick="history.back()" value="回到上一頁"></input>
<table width="200" border="1">
  <tr>
    <td>mid</td>
    <td>mname</td>
    <td>mprice</td>
  </tr>
<?php
$mertial1=rand(50,70);
$mertial2=rand(100,200);
$mertial3=rand(10,20);
updateMeterial(1,$mertial1);
updateMeterial(2,$mertial2);
updateMeterial(3,$mertial3);
if ($mertial) {
	while (	$rs=mysqli_fetch_assoc($mertial)) {
		echo "<tr><td>" . $rs['mid'] . "</td>";
		echo "<td>{$rs['mname']}</td>";
		echo "<td>" , $rs['mprice'], "</td></tr>";
	}
} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
