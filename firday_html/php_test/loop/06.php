<html>
<head>
<title>while迴圈</title>
</head>
<body>
<p>while迴圈<hr>
1加到10為:
<?php
$i=1;
$sum=0;
while ($i<=10)
{
 $sum = $sum + $i;
 $i++;
}
echo "<p>".$sum;
?>
</body>
</html>