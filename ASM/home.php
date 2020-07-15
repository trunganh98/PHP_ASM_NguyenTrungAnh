<?php
require_once 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        body{
            text-align: center;
            background-image: url("cute-background.jpg");
            background-size: cover;

        }
        li{
            margin: 10px;
            height: 300px;
            display: inline-table;
            text-align: center;
            background-color: #ffffff;
            color: #00080a;
            font-size: 16pt;
        }
        img{
            width: 220px;
            height:220px;
        }
        a{
            color: whitesmoke;
            font-size:23pt;
        }
        h1{
            font-size:50pt;
        }

    </style>
</head>
<body>
<h1>Laptop Store</h1>
<h2>List Product</h2>

<ul>
    <?php
    $query = "Select * from products;";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    for($i = 0; $i< $rows; $i++){
        $row = $result->fetch_array(MYSQLI_NUM);
        echo "<li><img src='jpg/$row[4]'><br><a href='#'><span>$row[1]</span></a><br><span>Price $row[2]$$$</span><br><span>$row[1]</span></li>";
    }
    ?>

</ul>
</body>
</html>
