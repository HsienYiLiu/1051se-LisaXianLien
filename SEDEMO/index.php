<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />
<title>Bread Factory</title>
<style type="text/css">
body {
font-family: 微軟正黑體;
font-size: 14pt;
}
table tr td {
padding: 10px;
}
div {
margin: 100px auto;
width: 800px;
padding: 50px 100px;
}
</style>
</head>
<body>
<form method="post" action="login.php">
<div id="rr" align="center" >
<h2>Welcome Bread Factory</h2>
<table cellpadding="5">
<tr><td align="right">帳號 : </td><td align="left"><input type="text" name="id"></td></tr>
<tr><td align="right">密碼 : </td><td align="left"><input type="password" name="pwd"></td></tr>
<tr><td colspan="2" align="center">
<input type="button" value="註冊" onclick="location.href='join.php'">
/
<input type="submit" value="登入">
</table>
</div>
</form>
</body>
</html>