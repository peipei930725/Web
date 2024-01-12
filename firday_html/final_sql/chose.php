<?php
    session_start();

    include("connection.php");

    $select_db = @mysqli_select_db($link, "nba");
    if (!$select_db) {
        echo '<br>找不到資料庫!<br>';
    } 
    else {
        isset($_SESSION["usrid"]);
        $usrid = $_SESSION["usrid"];
        
        $sql_popularity = "SELECT SUM(popularity_ranking) AS total_popularity FROM players_popularity_ranking";
        $result = mysqli_query($link, $sql_popularity);
        $row = mysqli_fetch_assoc($result);
        $total_popularity = $row['total_popularity'];
    
        $sql_champion = "SELECT SUM(predict_ranking) AS total_predict FROM champion_predict";
        $result = mysqli_query($link, $sql_champion);
        $row = mysqli_fetch_assoc($result);
        $total_predict = $row['total_predict'];


        $sql_player = "SELECT English_name FROM usr WHERE usrid = '$usrid'";//找到使用者的最愛球員
        $result = mysqli_query($link, $sql_player);
        $row = mysqli_fetch_assoc($result);
        $sql_player = $row['English_name'];
        
        $sql_player_rate = "SELECT popularity_ranking FROM players_popularity_ranking WHERE English_name = '$sql_player'";
        $result = mysqli_query($link, $sql_player_rate);
        $row = mysqli_fetch_assoc($result);
        $player_rate = $row['popularity_ranking'] / $total_popularity * 100;


        $sql_team = "SELECT team FROM usr WHERE usrid = '$usrid'";//找到使用者的最愛球隊
        $result = mysqli_query($link, $sql_team);
        $row = mysqli_fetch_assoc($result);
        if ($row !== null) {
            $sql_team = $row['team'];
        } 

        $sql_team_rate = "SELECT predict_ranking FROM champion_predict WHERE team = '$sql_team'";
        $result = mysqli_query($link, $sql_team_rate);
        $row = mysqli_fetch_assoc($result);
        $team_rate = $row['predict_ranking'] / $total_predict * 100;

        echo '<br>你選擇的球員為: ' . $sql_player . '<br>';
        echo '<br>你選擇的球隊為: ' . $sql_team . '<br>';

        echo '<br>球員熱度排名: ' . $player_rate . '%<br>';
        echo '<br>球隊熱度排名: ' . $team_rate . '%<br>';
    }


?>