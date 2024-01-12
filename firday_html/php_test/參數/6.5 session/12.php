<?php
session_start();//宣告session之前不可以有html的字串輸出
?>
<html>
<head>
<title>Session</title>
</head>
<body>
<p>傳過來的參數:
<?php
$filename = $_GET["usrname"];
$fileid = $_GET["id"];
//session名稱不能與$filename，$fileid一樣
$_SESSION["name"]=$filename;
$_SESSION["id"]=$fileid;
echo "<p>帳號: ".$filename;
echo "<p>密碼: ".$fileid;
?>
<p><a href=13.php>到下一個頁面看看</a>
</body>
</html>