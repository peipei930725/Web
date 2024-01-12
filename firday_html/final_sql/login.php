<html>
<head>
<title>會員登入</title>
<style>
    td,th {
        padding: 10px;
        font-size:15px;
    }
    body{
        background-color: #f2f2f2;
    }
</style>

</head>
<body>
<form method="get" action="login_db.php">
<p align="center"><font size="6" face="標楷體" color=black>NBA會員註冊</font></p>
<hr>
<center>
<table border="0" width="30%" padding="5px">
<tr bgcolor=#4A4D9D style="color:#FFFFFF">
<td align="right">會員ID: </td>
<td align="left"><input type=text maxLength="10" size="10"name="id"></td>
<tr bgcolor=#A4ABD6 style="color:#FFFFFF">
<td align="right">密碼: </td>
<td align="left"><input type=text maxLength="10" size="10"name="passwd"></td>
</table>

<p align="center">
<input value=" 登  入" type="submit">
<input value=" 清  除 " type="reset" > 
</form>
</body>
</html>