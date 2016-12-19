
<?php
session_start();
require("Api.php");
$result=getMsgList();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test</title>
</head>

<body>
<p>my guest book !!

</p>
<hr />
<table width="200" border="1">
  <tr>
    <td>pid</td>
    <td>pwd</td>
    <td>money</td>
  </tr>
<?php
if ($result) {
	while (	$rs=mysqli_fetch_assoc($result)) {
		echo "<tr><td>" . $rs['pid'] . "</td>";
		echo "<td>{$rs['pwd']}</td>";
		echo "<td>" , $rs['money'], "</td></tr>";
	}
} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
</body>
</html>
