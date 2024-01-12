<?php
include("connection.php");

$select_db=@mysqli_select_db($link,"school");
if(!$select_db){
    echo '<br>找不到資料庫!<br>';
}
else{
        
    $usrid = $_GET['usrid'];

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
<?php if (!empty($usr)):?>
<form method="get" action="update.php">
<p align="center"><font size="4" face="標楷體" color=blue>會員資料</font></p>
<hr>
<TT>
<center>
<table border="0" width="30%">
<tr bgcolor=pink>
<td align="right">會員ID: </td>
<td align="left">
    <?php echo $usr['usrid']; ?>
    <input type="hidden" name="usrid" value="<?php echo $usr['usrid']; ?>">
</td>
<tr>
<td align="right">密碼: </td>
<td align="left"><input type=text maxLength="10" size="10" name="passwd" value="<?php echo $usr['passwd']; ?>"></td>
<tr bgcolor=#77DDFF>
<td align="right">E‐Mail: </td>
<td align="left"><input type=text  size="20" name="EMail" value="<?php echo $usr['EMail']; ?>"></td>
<tr>
<td align="right">性別:</td>
<td align="left">
    <input value="M" type="radio" name="sex" <?php echo $usr['sex'] == 'M' ? 'checked' : ''; ?>>男
    <input value="F" type="radio" name="sex" <?php echo $usr['sex'] == 'F' ? 'checked' : ''; ?>>女
<tr bgcolor=pink>
<td align="right">生日:</td>
<td align="left">
西元:<input type=text maxLength="4" size="4" name="year" value="<?php echo $usr['year']; ?>">年
<input type=text maxLength="4" size="2" name="mon" value="<?php echo $usr['month']; ?>">月
<input type=text maxLength="4" size="2" name="days" value="<?php echo $usr['day']; ?>">日
<tr>
<td align="right">興趣:</td>
<td align="left">
<select name="hobby">
    <option value="literature" <?php echo $usr['hobby'] == 'literature' ? 'selected' : ''; ?>>文學</option>
    <option value="exercise" <?php echo $usr['hobby'] == 'exercise' ? 'selected' : ''; ?>>運動</option>
    <option value="music" <?php echo $usr['hobby'] == 'music' ? 'selected' : ''; ?>>音樂</option>
    <option value="science" <?php echo $usr['hobby'] == 'science' ? 'selected' : ''; ?>>科學</option>
    <option value="art" <?php echo $usr['hobby'] == 'art' ? 'selected' : ''; ?>>藝術</option>
    <option value="modern" <?php echo $usr['hobby'] == 'modern' ? 'selected' : ''; ?>>時尚</option>
</select >
<tr bgcolor=#77DDFF>
<td align="right">星座:</td>
<td align="left">
<select name="star">
    <option value=5 <?php echo $usr['star'] == '5' ? 'selected' : ''; ?>>白羊座</option>
    <option value=6 <?php echo $usr['star'] == '6' ? 'selected' : ''; ?>>金牛座</option>
    <option value=7 <?php echo $usr['star'] == '7' ? 'selected' : ''; ?>>雙子座</option>
    <option value=8 <?php echo $usr['star'] == '8' ? 'selected' : ''; ?>>巨蟹座</option>
    <option value=9 <?php echo $usr['star'] == '9' ? 'selected' : ''; ?>>獅子座</option>
    <option value=10 <?php echo $usr['star'] == '10' ? 'selected' : ''; ?>>處女座</option>
    <option value=11 <?php echo $usr['star'] == '11' ? 'selected' : ''; ?>>天秤座</option>
    <option value=12 <?php echo $usr['star'] == '12' ? 'selected' : ''; ?>>天蠍座</option>
    <option value=13 <?php echo $usr['star'] == '13' ? 'selected' : ''; ?>>射手座</option>
    <option value=14 <?php echo $usr['star'] == '14' ? 'selected' : ''; ?>>魔羯座</option>
    <option value=15 <?php echo $usr['star'] == '15' ? 'selected' : ''; ?>>水瓶座</option>
    <option value=16 <?php echo $usr['star'] == '16' ? 'selected' : ''; ?>>雙魚座</option>
</select >
<tr>
<td align="right">職業:</td>
<td align="left">
<select name="job">
    <option value=17 <?php echo $usr['job'] == '17' ? 'selected' : ''; ?>>士</option>
    <option value=18 <?php echo $usr['job'] == '18' ? 'selected' : ''; ?>>農</option>
    <option value=19 <?php echo $usr['job'] == '19' ? 'selected' : ''; ?>>工</option>
    <option value=20 <?php echo $usr['job'] == '20' ? 'selected' : ''; ?>>商</option>
    <option value=21 <?php echo $usr['job'] == '21' ? 'selected' : ''; ?>>其他</option>
</select >
<tr bgcolor=pink>
<td align="right" width=20%>電話:</td>
<td align="left">
<input maxLength="15" size="15" name="phone" type="text" value="<?php echo $usr['phone']; ?>">
</table>
<p align="center">
<input value="修改" type="submit">
</form>
<?php endif ?>
</body>
</html>