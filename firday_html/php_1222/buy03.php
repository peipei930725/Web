<?php
include("connection.php");

$bookid=isset($_GET["id"]) ? $_GET["id"] : '';
$number=isset($_GET["number"]) ? $_GET["number"] : '';
echo  'number:'.$number.'<br>';
$bid00=isset($_GET["bid"]) ? $_GET["bid"] : '';
echo  'bid01:'.$bid00.'<br>';
$chk=isset($_GET["chk"]) ? $_GET["chk"] : '';
echo  'chk:'.$chk.'<br>';

$select_db=@mysqli_select_db($link,"school");
if($chk==1){
    if($bid00==''){
        $sql_query="select max(bid) from baseket";
        $result=mysqli_query($link,$sql_query);
        $row=mysqli_fetch_array($result);
        $bid00=$row[0];
        $bid00++;
        echo 'bid02:'.$bid00.'<br>';
    }
    $sql_query="INSERT INTO baseket VALUES ('".$bid00."','".$bookid."','".$number."')";
    mysqli_query($link,$sql_query);
}
?>

<body>
<center>
<p><br>
<p><br>

<font size=6 color=blue>EBook-書購網-商品購買</font>
<table border=0 width=50%>
<tr>
<p><br>
<td><a href=buy01.php?cate=1&bid=<?php echo $bid00?>>程式設計</a>
<td><a href=buy01.php?cate=2&bid=<?php echo $bid00?>>應用軟體</a>
<td><a href=buy01.php?cate=3&bid=<?php echo $bid00?>>硬體/創客</a>
<td><a href=buy01.php?cate=4&bid=<?php echo $bid00?>>網路架站</a>
</table>
<hr>
<center><font color=#930000>我的購物車</font></center>
</body>

<?php
$del=isset($_GET["del"]) ? $_GET["del"] : '';
if($del==1){
    $bookid=isset($_GET["bookid"]) ? $_GET["bookid"] : '';
    $bid00=isset($_GET["bid"]) ? $_GET["bid"] : '';
    $sql_query="delete from baseket where bid='".$bid00."' and bookid='".$bookid."' ";
    mysqli_query($link,$sql_query);
}

$sql_query="select * from baseket where bid='".$bid00."'  ";//檢查是否刪光
$result=mysqli_query($link,$sql_query);
if(mysqli_num_rows($result)==0)
    $bid00='';


echo '<center><table width=100% border=0>';
echo '<tr bgcolor=pink>';
echo '<td align=center>訂單編號<td align=center>書名<td align=center>作者<td align=center>出版商<td align=center>單價(非會員)';
echo '<td align=center>單價(會員)<td align=center>數量<td align=center>刪除';

while($row=mysqli_fetch_array($result)){
    $sql_query00="select * from book where id='".$row[1]."' ";
    $result00=mysqli_query($link,$sql_query00);

    $row00=mysqli_fetch_array($result00);
    echo '<tr>';
    echo '<td align=center>'.$row[0];
    echo '<td align=center>'.$row00[1];
    echo '<td align=center>'.$row00[2];
    echo '<td align=center>'.$row00[3];
    echo '<td align=center>'.$row00[8];
    echo '<td align=center>'.($row00[8]*0.85);
    echo '<td align=center>'.$row[2];
    echo '<td align=center><a href="buy03.php?bid='.$bid00.'&bookid='.$row[1].'&del=1">刪除</a>';    
}

echo '</table>';

echo '<form action=buy04.php method=get>';
echo '<input type="hidden" name="bid" value='.$bid00.'>';
echo '<p align=left><table width=100% border=0>';

echo '<tr><td align=left>請輸入收件人:<input type=text name=id size=20>(若是會員，請輸入會員姓名)';
echo '<tr><td align=left>請輸入連絡電話:<input type=text name=tel size=20>';
echo '<tr><td align=left>請輸入送貨地址:<input type=text name=address size=20>';

echo '<tr><td><input type=submit value=確定購買>';
echo '</form>';
echo '</table>';
?>