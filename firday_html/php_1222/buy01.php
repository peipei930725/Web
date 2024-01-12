<?php
$cate = isset($_GET["cate"]) ? $_GET["cate"] : '';
$word = isset($_GET["word"]) ? $_GET["word"] : '';
$bid = isset($_GET["bid"]) ? $_GET["bid"] : '';
echo 'cate='.$cate.'<br>';
echo 'bid='.$bid.'<br>';

include("connection.php");

$select_db=@mysqli_select_db($link,"school");
if(!$select_db){
    echo '<br>找不到資料庫!<br>';
}else{
    $sql_query= "select * from book where cate='".$cate." ' ";
    $result=mysqli_query($link,$sql_query);

    echo '<center> <table width=100% border=0>';
    echo '<tr>';

    $cnt=0;
    while($row= mysqli_fetch_array($result)){
        $cnt++;
        if($cnt==6)
            echo '<tr>';
        echo '<td width=20%><center><img src=../php_1222/pic/'.$row[0].'.jpg width=100 hight=100><br>';
        echo '<a href=buy02.php?id='.$row[0].'&bid='.$bid.'>'.$row[1].'</a>';
    }

    echo '</table>';
}
?>