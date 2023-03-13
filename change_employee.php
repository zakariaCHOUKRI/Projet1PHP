<?php
    if(!isset($_SESSION))
    { 
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="get">
        <input type="text" name="search_emp" id="search_emp">
    </form>
    <?php 
    try{
        $conn = new PDO("mysql:host=".$hostname.";dbname=employees", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     }
     catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
        $querySearch = "SELECT"
    ?>
</body>
</html>