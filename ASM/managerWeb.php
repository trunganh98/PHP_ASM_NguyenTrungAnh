<?php
require_once 'conn.php';
session_start();
echo "Welome Admin " . $_SESSION['username'];
echo "<br><a href='admin.php'>Logout</a><br><br>";


//add new product
if(isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['company'])){
    $name = $_POST['productName'];
    $price = $_POST['price'];
    $company = $_POST['company'];
    $nameImage = $_POST['nameImage'];
    $query = "insert into products values ('','$name','$price','$company', '$nameImage'); ";
    $result = $conn->query($query);

    if($result) echo "Add product success!!!";
    else{
        echo "The product already!!!!";
    }
}
echo <<<end
<pre>
<form action="managerWeb.php" method="post">
Product Name <input type="text" name="productName"><br>
Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="price">$$$$<br>
Company &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="company"><br>
nameImage &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nameImage"><br><br>
<input type="submit" value="ADD NEW PRODUCT"> | <a href='findProduct.php'><input type='button' value='FIND & UPDATE PRODUCT'></a>
</form>
</pre>
end;
//delete product
if(isset($_POST['delete']) && isset($_POST['productID'])){
    $productID = $_POST['productID'];
    $query = "Delete from products where productID ='$productID'; ";
    $result = $conn->query($query);
    if(!$query) die("Delete Fail!!!");
}

// view all products
$query = "select * from products;";
$result = $conn->query($query);
$rows = $result->num_rows;
for ($i = 0; $i < $rows; $i++ ){
    $row = $result->fetch_array(MYSQLI_NUM);
    $r0 = $row[0];
    $r1 = $row[1];
    $r2 = $row[2];
    $r3 = $row[3];
    $r4= $row[4];

    echo <<<_end
<pre>
<br>Product ID: $r0;
<br>Product Name: $r1;
<br>Price: $r2;
<br>Company: $r3;
<br>nameImage: $r4;
</pre>
<form action="managerWeb.php" method="post">
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="productID" value="$r0">
<input type="submit" value="DELETE PRODUCT">
</form>
_end;
}

?>