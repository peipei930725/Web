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
<form method="get" action="add_db.php">
<p align="center"><font size="6" face="標楷體" color=black>最愛的NBA球員/隊伍</font></p>
<hr>
<center>
<table border="0" width="30%" padding="5px">
<tr bgcolor=#4A4D9D style="color:#FFFFFF">
<td align="right">喜愛的隊伍: </td>
<td align="left"><input type=text maxLength="10" size="10"name="favorite_team"></td>
<tr bgcolor=#A4ABD6 style="color:#FFFFFF">
<td align="right">喜愛的球員: </td>
<td align="left"><input type=text maxLength="20" size="10"name="favorite_player"></td>
</table>

<p align="center">
<input value=" 新  增 " type="submit">
<input value=" 清  除 " type="reset" > 
</form>
</body>
</html>