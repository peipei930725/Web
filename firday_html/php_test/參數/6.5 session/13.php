<?php
session_start();//宣告session之前不可以有html的字串輸出
?>
<html>
<head>
<title>Session</title>
</head>
<body>
<p>原來的參數:
<?php
echo "<p>帳號: ".$filename;
echo "<p>密碼: ".$fileid;
?>
<p>session的參數:
<?php
echo "<p>帳號: ".$_SESSION["name"];
echo "<p>密碼: ".$_SESSION["id"];
?>
<p><a href=04.php>到下一個頁面看看</a>
</body>
</html>