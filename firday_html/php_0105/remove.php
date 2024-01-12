<html>
<head>
<title>刪除會員資料</title>
</head>
<script>
function confirmDelete() {
    if (document.getElementById('usrid').value == "") {
        alert("請輸入會員帳號");
        return;
    }
    var usrid = document.getElementById('usrid').value;
    var r = confirm("確定要刪除?");
    if (r == true) {
        window.location.href = "remove.php?usrid=" + usrid;
    }
}
</script>
<body>
<form method="get" action="remove_db.php">
<p align="center"><font size="4" face="標楷體" color=blue></font></p>

<TT>

<table border="0">
<tr bgcolor=pink>
<td align="right">請輸入會員帳號: </td>
<td align="left"><input type=text maxLength="10" size="10"
name="usrid" id="usrid">

</td>
</table><hr>
<button type="button" onclick="confirmDelete()">刪除</button>
<tr>

</form>
</body>
</html>