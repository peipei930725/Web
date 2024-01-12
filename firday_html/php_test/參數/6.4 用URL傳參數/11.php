<html>
<head>
<title>用URL傳參數</title>
</head>
<body>
<p>傳過來的參數:
<?php
$filename = $_GET["usrname"];
$fileid = $_GET["id"];
echo "<p>帳號: ".$filename;
echo "<p>密碼: ".$fileid;
?>
</body>
</html>