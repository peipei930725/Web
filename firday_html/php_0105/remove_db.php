<?php
include("connection.php");

$select_db=@mysqli_select_db($link,"school");
if(!$select_db){
    echo '<br>找不到資料庫!<br>';
}
else{
    $usrid = $_GET['usrid']; // 從 GET 請求中取得用戶 ID
    $select_db = @mysqli_select_db($link, "school");

    if ($usrid) {
        $sql = "SELECT * FROM `usr` WHERE `usrid` = '$usrid'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "查無此人";
            echo '<br>';
            echo '<button onclick="location.href=\'28.php\'">回到首頁</button>';
        }else{
            $sql = "DELETE FROM `usr` WHERE `usrid`='$usrid'"; // 建立 SQL 查詢
            $result = mysqli_query($link, $sql); // 執行 SQL 查詢
            if ($result) {
                echo "刪除成功";
                echo '<br>';
                echo '<button onclick="location.href=\'28.php\'">回到首頁</button>';
            } else {
                echo "刪除失敗";
                echo '<br>';
                echo '<button onclick="location.href=\'28.php\'">回到首頁</button>';
            }
        }
    }else {
        echo "請輸入帳號";
        echo '<br>';
        echo '<button onclick="location.href=\'28.php\'">回到首頁</button>';
    }
}
?>