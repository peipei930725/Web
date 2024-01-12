<?php
    $id = $_GET["id"];
    $address = $_GET["address"];
    $tel = $_GET["tel"];
    $bid = $_GET["bid"];
    
    include("connection.php");
    $select_db=@mysqli_select_db($link,"school");
    if($id ==''||$address==''||$tel==''||$bid==''){
        echo "<font color=red size=5>資料不完整，請回上一頁</font>";
    }
    else{
        $member = 0;
        $price = 0;
        $sql_query = "SELECT * FROM usr WHERE usrid = '".$id."' ";
        $result = mysqli_query($link,$sql_query);
        if(mysqli_num_rows($result) == 1){
            $member = 1;
        }
        $sql_query = "SELECT * FROM baseket WHERE bid = '".$bid."' ";
        $result = mysqli_query($link,$sql_query);
        while($row=mysqli_fetch_array($result)){
            $sql_query00="select * from book where id='".$row[1]."'  ";
            $result00=mysqli_query($link,$sql_query00);
            $row00=mysqli_fetch_array($result00);

            if($member==1)
                $price=$price+$row00[8]*0.85*$row[2];
            else
                $price=$price+$row00[8]*$row[2];

            $cnt=$row00[9]-$row[2];
            $sql_qry="UPDATE `book` SET `inventory` = '".$cnt."' WHERE `book`.`id` = '".$row00[0]."'";
            mysqli_query($link,$sql_qry);
        }
        $sql_query="INSERT INTO final VALUES ('".$bid."','".$id."','".$tel."','".$address."','".$price."')";
        mysqli_query($link,$sql_query);
        echo '<p>新增成功!';
        include ("buy.php");
    }

?>