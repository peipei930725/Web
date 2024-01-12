<?php
    include("connection.php");

    $select_db=@mysqli_select_db($link,"nba");
    if(!$select_db){
        echo '<br>找不到資料庫!<br>';
    }
    else{
        if(isset($_GET["id"]) && isset($_GET["passwd"])) {
            $usrid = $_GET["id"];
            $password = $_GET["passwd"];

            $sql_query_id= "select * from usr where usrid='".$usrid." ' ";
            $sql_query_pwd= "select * from usr where passwd='".$password."'";
            
            $result_id=mysqli_query($link,$sql_query_id);
            $result_pwd=mysqli_query($link,$sql_query_pwd);

            if(mysqli_num_rows($result_id)===0){
                echo '<br>查無此帳號!<br>';
            }
            else{
                if(!$result_pwd){
                    echo '<br>登入失敗!<br>';
                }
                else{
                    if(mysqli_num_rows($result_pwd)===0){
                        echo '<br>密碼錯誤!<br>';
                    }
                    else{
                        session_start();

                        $_SESSION["usrid"] = $usrid;
                        echo '<br>登入成功!<br>';
                    }
                
            }
        }
    }
    }
?>