<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javescript</title>

    <script src="9-50.js"></script>
    <link rel="stylesheet" href="9-50.css">
</head>

<body>
    <p>傳過來的參數</p>

    <?php  
    $bloodtype= $_GET["bloodtype"];
    $sex=$_GET["sex"];
    $id=$_GET["sid"];

    echo "<p>血型: " .$bloodtype;
    echo "<p>性別: " .$sex;
    echo "<p>ID: " .$id;

    if(isset($_GET['fruit']))
    {
        foreach($_GET['fruit'] as $key => $value) 
        {
            echo "<p>$value";
        }
    }
    else
    {
        echo "NO value!";
    }

    $filename = $_GET["username"];
    $fileid = $_GET["id"];
    echo "<p>帳號: ".$filename;
    echo "<p>密碼: ".$fileid;

    ?>
</body>

</html>