<?php
include("connection.php");

$usrid = $_GET['usrid'];

$select_db=@mysqli_select_db($link,"school");
if(!$select_db){
    echo '<br>找不到資料庫!<br>';
}
else{
    if ($usrid){
        $sql = "SELECT * FROM `usr` WHERE `usrid` = '$usrid'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            list($year, $month, $day) = explode('-', $data['birthday']);
            $usr = [
                'usrid' => $_GET['usrid'],
                'passwd' => $data['passwd'],
                'EMail' => $data['EMail'],
                'sex' => $data['sex'],
                'birthday' => $data['birthday'],
                'hobby' => $data['hobby'],
                'star' => $data['star'],
                "job" => $data['job'],
                "phone" => $data['phone'],
                'year' => $year,
                'month' => $month,
                'day' => $day
                ];
        }else{
            echo "查無此人";
            echo '<br>';
    echo '<button onclick="location.href=\'28.php\'">回到首頁</button>';
        }
    }else{
        echo "請輸入帳號";
        echo '<br>';
    echo '<button onclick="location.href=\'28.php\'">回到首頁</button>';
    }
}

?>

<html>
<head>
<title>會員資料</title>
</head>
<body>
<?php if (!empty($data)):?>
<p align="center"><font size="4" face="標楷體" color=blue>會員資料</font></p>
<hr>
<TT>
<center>
<table border="0" width="30%">
<tr bgcolor=pink>
<td align="right">會員ID: </td>
<td align="left"><?php echo $usr['usrid']; ?></td>
<tr>
<td align="right">密碼: </td>
<td align="left"><?php echo $usr['passwd']; ?></td>
<tr bgcolor=#77DDFF>
<td align="right">E‐Mail: </td>
<td align="left"><?php echo $usr['EMail']; ?></td>
<tr>
<td align="right">性別:</td>
<td align="left">
<?php echo $usr['sex'] == 'M' ? '男' : '女'; ?>
<tr bgcolor=pink>
<td align="right">生日:</td>
<td align="left">
西元:<?php echo $usr['year']; ?>年
<?php echo $usr['month']; ?>月
<?php echo $usr['day']; ?>日
<tr>
<td align="right">興趣:</td>
<td align="left">
<?php
$hobbyMap = [
    'literature' => '文學',
    'exercise' => '運動',
    'music' => '音樂',
    'science' => '科學',
    'art' => '藝術',
    'modern' => '時尚',
];

echo $hobbyMap[$usr['hobby']];
?>
<tr bgcolor=#77DDFF>
<td align="right">星座:</td>
<td align="left">
<?php
$starMap = [
    '5' => '白羊座',
    '6' => '金牛座',
    '7' => '雙子座',
    '8' => '巨蟹座',
    '9' => '獅子座',
    '10' => '處女座',
    '11' => '天秤座',
    '12' => '天蠍座',
    '13' => '射手座',
    '14' => '魔羯座',
    '15' => '水瓶座',
    '16' => '雙魚座',
];

echo $starMap[$usr['star']];
?>
<tr>
<td align="right">職業:</td>
<td align="left">
<?php
$jobMap = [
    '17' => '士',
    '18' => '農',
    '19' => '工',
    '20' => '商',
    '21' => '其他',
];

echo $jobMap[$usr['job']];
?>
<tr bgcolor=pink>
<td align="right" width=20%>電話:</td>
<td align="left">
<?php echo $usr['phone']; ?>
</table>
<p align="center">
<button onclick="location.href='28.php'">回到首頁</button>
</form>
<?php endif ?>
</body>
</html>