<?php
    $filename = $_GET["id"];
    $filepasswd = $_GET["name"];
    
    //連接資料庫
    include("connection.php");
    $select_db = @mysqli_select_db($link,"school");  //選擇資料庫
    if(!$select_db){
        echo '<br>找不到資料庫<br>';
    }
    else{
        $sql_query = "select * from usr where usrid='".$filename."' and passwd='".$filepasswd."' ";  //下sql語法
        $result = mysqli_query($link,$sql_query);  //執行sql語法，執行玩丟給result
        
        if(mysqli_num_rows($result) == 1){
            echo 'Welcome!';
        }
        else{
            echo 'Your account does not exist.';
        }
    }
?>