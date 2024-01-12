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
        
            // 獲取原來的球員名稱
            $sql_old = "SELECT English_name FROM usr WHERE usrid = '$usrid'";
            $result_old = mysqli_query($link, $sql_old);

            $sql_old_team = "SELECT team FROM usr WHERE usrid = '$usrid'";
            $result_old_team = mysqli_query($link, $sql_old_team);

            $row_old = mysqli_fetch_assoc($result_old);
            $row_old_team = mysqli_fetch_assoc($result_old_team);

            $old_player = $row_old['English_name'];
            $old_team = $row_old_team['team'];
        
            // 更新使用者資訊
            $sql_update = "UPDATE usr SET English_name = '$favorite_player', team = '$favorite_team' WHERE usrid = '$usrid'";
            $result = mysqli_query($link, $sql_update);
        
            if ($result) {
                echo '<br>更改成功!<br>';
        
                // 將新的球員熱度加 1
                $sql_new = "UPDATE players_popularity_ranking SET popularity_ranking = popularity_ranking + 1 WHERE English_name = '$favorite_player'";
                mysqli_query($link, $sql_new);
        
                // 將原來的球員熱度減 1
                $sql_old = "UPDATE players_popularity_ranking SET popularity_ranking = popularity_ranking - 1 WHERE English_name = '$old_player'";
                mysqli_query($link, $sql_old);

                echo $favorite_team ;
                // 將新的球隊熱度加 1
                $sql_new_team = "UPDATE champion_predict SET predict_ranking = predict_ranking + 1 WHERE team = '$favorite_team'";
                mysqli_query($link, $sql_new_team);

                // 將原來的球隊熱度減 1
                $sql_old_team = "UPDATE champion_predict SET predict_ranking = predict_ranking - 1 WHERE team = '$old_team'";
                mysqli_query($link, $sql_old_team);
            } else {
                echo '<br>更改失敗!<br>';
            }
        }
    }
?>  