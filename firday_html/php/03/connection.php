<?php
    $location="localhost";
    $account="root";
    $password="";

    $link=mysqli_connect($location,$account,$password);
    if(!$link)
    {
        echo "連線失敗<br>";
    }
    else
    {
        echo "連線成功<br>";
    }
?>