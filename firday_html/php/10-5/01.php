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
    <form method="get" id="form1" action="02.php">
    <p>
        學號: <input type="text" name="sid" id="data">
    </p>

    <p>
        性別:
        <select name="sex" onchange="mySelect()">
            <option selected>請選擇</option>
            <option>男</option>
            <option>女</option>
        </select>
    </p>

    <p>
        血型:
        <select id="sel" name="bloodtype">
            <option selected>A</option>
            <option>B</option>
            <option>O</option>
            <option>AB</option>
        </select>
    </p>

    <p><input type="checkbox" name="fruit[]" value="apple">apple</p>
    <p><input type="checkbox" name="fruit[]" value="orange">orange</p>
    <p><input type="checkbox" name="fruit[]" value="banana">banana</p>
    <p><input type="checkbox" name="fruit[]" value="strawberry">strawberry</p>

    <button type="submit" onclick=check()>送出</button>

    </form>

    <p><a href="02.php?username=john&id=123">這是一個超連結，會傳john</a></p>
    <p><a href="02.php?username=cindy&id=456">這是一個超連結，會傳cindy</a></p>
    <p><a href="02.php?username=kevin&id=789">這是一個超連結，會傳kevin</a></p>
</body>

</html>