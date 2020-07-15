<?php
require_once 'conn.php';
session_start();
if(isset($_POST['Admin'])&& isset($_POST['password'])){
    $username = $_POST['Admin'];
    $password = $_POST['password'];


    $query = "Select * from users where username = '$username' and password = '$password';";
    $result = $conn->query($query);
    $rows = $result->num_rows;

    if($rows){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('location: managerWeb.php');
    }
    else{
        echo "Invalid username/password!!!";
    }

    $result->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <style>
    </style>
</head>
<body>
<h1>Login Admin</h1>
<form action="admin.php" method="post">
    Admin <br><input type="text" name="Admin"><br>
    Password <br><input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
</body>
</html>

