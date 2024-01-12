<html>
<head>
<title>會員註冊</title>
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
<form method="get" action="signup_db.php">
<p align="center"><font size="6" face="標楷體" color=black>NBA會員註冊</font></p>
<hr>
<TT>
<center>
<table border="0" width="30%" padding="5px">
<tr bgcolor=#4A4D9D style="color:#FFFFFF">
<td align="right">會員ID: </td>
<td align="left"><input type=text maxLength="10" size="10"
name="usrid">(中、英文皆可)</td>
<tr bgcolor=#A4ABD6 style="color:#FFFFFF">
<td align="right">密碼: </td>
<td align="left"><input type=text maxLength="10" size="10"
name="passwd"></td>
<tr>
<td align="right">E‐Mail: </td>
<td align="left"><input type=text  size="20"
name="EMail"></td>
<tr bgcolor=#4A4D9D style="color:#FFFFFF">
<td align="right">性別:</td>
<td align="left">
    <input value="M" type="radio" name="sex" checked>男
    <input value="F" type="radio" name="sex">女
<tr bgcolor=#A4ABD6 style="color:#FFFFFF">
<td align="right">生日:</td>
<td align="left">
西元:<input type=text maxLength="4" size="4" name="year">年
<input type=text maxLength="4" size="2" name="mon">月
<input type=text maxLength="4" size="2" name="days">日
<tr>  
<td align="right" width=20%>電話:</td>
<td align="left">
<input maxLength="15" size="15" name="phone" type="text">
</table>
<p align="center">
<input value="線上註冊" type="submit">
<input value=" 清  除 " type="reset" > 
</form>
</body>
</html>