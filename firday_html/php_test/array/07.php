<html>
<head>
<title>陣列</title>
</head>
<body>
<p>陣列<hr>
<?php
$no[1]="b100";
$no[2]="b101";
$no[3]="b102";
echo '收到的學號：';
for($i=1;$i<=3;$i++)
{
 echo "<p>".$no[$i];
}
?>
</body>
</html>