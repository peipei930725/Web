<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javescript</title>
    <script>
        function reloadPage() {
            window.location.href = window.location.pathname;
        }
        function start(){
            var id = "";
            var pwd = "";
            while(id === ""){
                id = prompt('What is your account?.', '');
            }
            while(pwd === "" && id !== ""){
                pwd = prompt('Enter your password','');
                if(pwd === '') {
                    alert("your password is null!!，go back to account.")
                }
            }
            document.getElementById("id").value = id;
            document.getElementById("pwd").value = pwd;
            if (id !== "" && pwd !== "") {
                document.getElementById("loginForm").submit();
            }
        }
        if (!window.location.search) {
            window.onload = start;
        }
    </script>
</head>

<body>
    <form id="loginForm" method="get" action="06.php">
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="pwd" name="pwd">
    </form>
<?php

    include("connection.php");

    $select_db=@mysqli_select_db($link,"school");
    if(!$select_db){
        echo '<br>找不到資料庫!<br>';
    }
    else{
        if(isset($_GET["id"]) && isset($_GET["pwd"])) {
            $username = $_GET["id"];
            $password = $_GET["pwd"];

            $sql_query_id= "select * from usr where usrid='".$username." ' ";
            $sql_query_pwd= "select * from usr where passwd='".$password."'";
            
            $result_id=mysqli_query($link,$sql_query_id);
            $result_pwd=mysqli_query($link,$sql_query_pwd);
            
            
            $id = mysqli_fetch_row($result_id);
            $pwd = mysqli_fetch_row($result_pwd);

            if ($id !== null && $pwd !== null && $id[0] === $pwd[0] && mysqli_num_rows($result_id) != 0) {
                echo "<br>登入成功<br>";
                echo "<br>歡迎".$id[0]."登入<br>";
            }
            else{
                echo "<br>登入失敗<br>";
            }
        }
    }
?>
<br>
<button onclick="reloadPage()">重新加載頁面</button>

</body>

</html>