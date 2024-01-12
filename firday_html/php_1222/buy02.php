<?php
include("connection.php");

$id = isset($_GET["id"]) ? $_GET["id"] : '';

$select_db=@mysqli_select_db($link,"school");
if(!$select_db){
    echo '<br>找不到資料庫!<br>';
}else{
    $sql_query= "select * from book where id='".$id." ' ";
    $result=mysqli_query($link,$sql_query);

    echo '<center> <table width=100% border=0>';
    echo '<tr>';

    $cnt=0;
    while($row= mysqli_fetch_array($result)){
        $cnt++;
        if($cnt==6)
            echo '<tr>';
        echo '<td width=20%><center><img src=../php_1222/pic/'.$row[0].'.jpg width=150 hight=150><br>';
        echo '書名: '.$row[1].'<br>';
        echo '作者: '.$row[2].'<br>';
        echo '出版商: '.$row[3].'<br>';
        echo '描述: '.$row[4].'<br>';
        echo '出版日: '.$row[5].'<br>';
        echo '售價(非會員): '.$row[6].'<br>';
        echo '售價(會員): '.$row[7].'<br>';
        echo '庫存: '.$row[8].'<br>';

        if($row[9]!=0){
            echo '<form action=buy03.php method=get>
            我要買:<select name="number">';
            for($i=1;$i<=$row[9];$i++){
                echo '<option value='.$i.'>'.$i.'</option>';
            }
            echo '</select>本';
            
            $bid = isset($_GET["bid"]) ? $_GET["bid"] : '';

            echo '
            <input type="hidden" name="id" value="'.$row[0].'">
            <input type="hidden" name="bid" value="'.$bid.'">
            <input type="hidden" name="chk" value="1">
            <p><input type="submit" value="加入購物車">
            </form>
            ';
        }
    }
    echo '</table>';
}
?>