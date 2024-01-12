<?php
    session_start();  // 開始 session

    include("connection.php");

    $select_db = @mysqli_select_db($link, "nba");
    if (!$select_db) {
        echo '<br>找不到資料庫!<br>';
    } 
    else {
        echo $_SESSION["usrid"];

        if (isset($_SESSION["usrid"]) && isset($_GET["favorite_player"]) && isset($_GET["favorite_team"])) {
            $usrid = $_SESSION["usrid"];
            $favorite_player = $_GET["favorite_player"];
            $favorite_team = $_GET["favorite_team"];

            // 更新使用者資訊
            $sql_update = "UPDATE usr SET English_name = '$favorite_player', team = '$favorite_team' WHERE usrid = '$usrid'";
            $result = mysqli_query($link, $sql_update);

            echo '<br>test!<br>';
            if ($result) {
                echo '<br>新增成功!<br>';
            } else {
                echo '<br>新增失敗!<br>';
            }
        }
        
        $sql = "UPDATE players_popularity_ranking SET popularity_ranking = popularity_ranking + 1 WHERE `English_name` = '$favorite_player'";
        $result = mysqli_query($link, $sql);
        $sql = "UPDATE champion_predict SET predict_ranking = predict_ranking + 1 WHERE `team` = '$favorite_team'";
        $result = mysqli_query($link, $sql);
    }
?>