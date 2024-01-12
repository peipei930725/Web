<?php
include("connection.php");

$select_db=@mysqli_select_db($link,"school");

$usrid = $_GET['usrid'];
$passwd = $_GET['passwd'];
$EMail = $_GET['EMail'];
$sex = $_GET['sex'];
$year = $_GET['year'];
$mon = $_GET['mon'];
$days = $_GET['days'];
$hobby = $_GET['hobby'];
$star = $_GET['star'];
$job = $_GET['job'];
$phone = $_GET['phone'];
$date = $year . '-' . str_pad($mon, 2, '0', STR_PAD_LEFT) . '-' . str_pad($days, 2, '0', STR_PAD_LEFT);
$select_db = @mysqli_select_db($link, "school");


if ((int)$mon < 0 || (int)$mon > 12 || (int)$days < 0 || (int)$days > 31 || (int)$year == 0 ) {
    echo "日期錯誤";
} 
elseif ($usrid && $passwd && $EMail && $sex && $year && $mon && $days && $hobby && $star && $job && $phone) {
    $sql = "UPDATE `usr` SET `passwd`='$passwd', `EMail`='$EMail', `sex`='$sex', `birthday`='$date', `hobby`='$hobby', `star`='$star', `job`='$job', `phone`='$phone' WHERE `usrid`='$usrid'";
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo "修改成功";
    } else {
        echo "修改失敗";
    }
} else {
    echo "資料不完全";
}
echo '<br>';
echo '<button onclick="location.href=\'28.php\'">回到首頁</button>';
?>