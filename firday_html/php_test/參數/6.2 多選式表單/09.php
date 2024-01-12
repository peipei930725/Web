<html>
<head>
<title>複選式表單</title>
</head>
<body>
<p>傳過來的參數:
<?php
if(isset($_GET['fruit']))
{
foreach($_GET['fruit'] as $key => $value) 
{
 echo "<p>$value";
}
}
else
{
echo "NO value!";
}
?>
</body>
</html>