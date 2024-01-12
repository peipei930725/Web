<?php
    include("connection.php");
    $select_db=mysqli_select_db($link,"school");

        if(!$select_db)
        {
            echo "資料庫選擇失敗";
        }
        else
        {
            $sid='S001';
            $sql_query="SELECT * FROM classes WHERE sid='$sid'";
            $result=mysqli_query($link,$sql_query);
            echo '<p>資料筆數:'.mysqli_num_rows($result).'<br>';
        }
        echo '<table border=1 width=50%>';
        echo '<tr>';
        echo '<td>eid';
        echo '<td>sid';
        echo '<td>C_No';
        echo '<td>time';
        echo '<td>room';
        echo '<td>score';
        while($row=mysqli_fetch_array($result)){
            echo '<tr>';
            echo '<td>'.$row[0];
            echo '<td>'.$row[1];
            echo '<td>'.$row[2];
            echo '<td>'.$row[3];
            echo '<td>'.$row[4];
            echo '<td>'.$row[5];
        }
        echo '</table>';
?>
