<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            color: #3a2529;
        }
        body{
            background-color: #FBDAE2;
        }
    </style>
</head>
<body>
    <h1>發文</h1>
    <form method="post" action="">
        <label for="title">標題:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">內容:</label><br>
        <textarea id="content" name="content" rows="10" cols="40"></textarea><br>
        <input type="submit" value="發布">
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("connection.php");

        $select_db = @mysqli_select_db($link, "nba");

        $title = mysqli_real_escape_string($link, $_POST["title"]);
        $content = mysqli_real_escape_string($link, $_POST["content"]);
        $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
        mysqli_query($link, $sql);

        // 重新導向到 chatting.php
    }
?>
