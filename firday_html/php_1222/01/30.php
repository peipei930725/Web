<?php
include("connection.php");

$select_db=@mysqli_select_db($link,"school");
if(!$select_db){
    echo '<br>找不到資料庫!<br>';
}
else{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Retrieve form data
        $usrid = $_GET["usrid"];
        $passwd = $_GET["passwd"];
        $EMail = $_GET["EMail"];
        $sex = $_GET["sex"];
        $year = $_GET["year"];
        $mon = $_GET["mon"];
        $days = $_GET["days"];
        $hobby = $_GET["hobby"];
        $star = $_GET["star"];
        $job = $_GET["job"];
        $phone = $_GET["phone"];
    
        // Validate the data (you may want to add more validation)
        if (empty($usrid) || empty($passwd) || empty($EMail) || empty($year) || empty($mon) || empty($days) || empty($phone)) {
            echo "<font color=red size=5>資料不完整，請填寫必填欄位</font>";
        } else {
            // Database connection
    
            // Check connection
            if (!$link) {
                die("Connection failed: " . mysqli_connect_error());
            }
    
            // Perform any additional validation or processing here
    
            // Insert data into usr table
            $sql = "INSERT INTO usr (usrid, passwd, `Email`, sex, birthday, hobby, star, job, phone) 
                VALUES ('$usrid', '$passwd', '$EMail', '$sex', '$year-$mon-$days', '$hobby', '$star', '$job', '$phone')";
    
            if (mysqli_query($link, $sql)) {
                echo "<h2>註冊成功！</h2>";
                echo "會員ID: $usrid<br>";
                echo "E-Mail: $EMail<br>";
                echo "性別: $sex<br>";
                echo "生日: $year 年 $mon 月 $days 日<br>";
                echo "興趣: $hobby<br>";
                echo "星座: $star<br>";
                echo "職業: $job<br>";
                echo "電話: $phone<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
    
            // Close the database connection
            mysqli_close($link);
        }
    }
}
?>