<?php
require_once 'conn.php';
echo <<<_end
<pre>
<form action="findProduct.php" method="post">
<input type="hidden" name="find" value="yes">
Enter Product Name <input type="text" name="productName"><br>
<input type="submit" value="FIND PRODUCT"> | <a href="managerWeb.php">Back</a>     
</form>
</pre>
_end;
//view all product
$query = "select * from products;";
$result = $conn->query($query);
$rows = $result->num_rows;
for ($i = 0; $i < $rows; $i++ ) {
    $row = $result->fetch_array(MYSQLI_NUM);
    $r0 = $row[0];
    $r1 = $row[1];
    $r2 = $row[2];
    $r3 = $row[3];
    $r4 = $row[4];
}
//find products
if(isset($_POST['productName']) && isset($_POST['find'])) {
    $productName = $_POST['productName'];
    $query = "select * from products where productName = '$productName';";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    $row = $result->fetch_array(MYSQLI_NUM);
    echo <<<_end
<pre>
<form action="findProduct.php" method="post">
<input type="hidden" name="update">
Product ID &nbsp;<input type="text" name="productID" value="$row[0]"><br>
Product Name <input type="text" name="productName"><br>
Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="price" >$$$$<br>
Company &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="company"><br>
nameImage   <input type="text" name="nameImage"><br><br>
<input type="submit" value="UPDATE PRODUCT">
</form>
</pre>
_end;

}
//update
if(isset($_POST['update'])&&isset($_POST['productID']) &&isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['company']) && isset($_POST['nameImage'])) {


    $name = $_POST['productName'];
    $price = $_POST['price'];
    $company = $_POST['company'];
    $nameImage = $_POST['nameImage'];

    $query = "update products set productName = '$name', company = '$company', price = '$price', nameImage='$nameImage' where productID=$row[0];";
    $result = $conn->query($query);
    if ($result) echo "Update product success!!!";

}

?>