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
<?php 
    $empId = $_SESSION['empId'];
    echo "Employee Id : ".$empId;


    include 'dbConfig.php';

    try{
        $birthDate = $conn->query("SELECT birth_date FROM employees WHERE emp_no = $empId")->fetchAll(PDO::FETCH_ASSOC)[0]['birth_date'];
        $firstName = $conn->query("SELECT first_name FROM employees WHERE emp_no = $empId")->fetchAll(PDO::FETCH_ASSOC)[0]['first_name'];
        $lastName = $conn->query("SELECT last_name FROM employees WHERE emp_no = $empId")->fetchAll(PDO::FETCH_ASSOC)[0]['last_name'];
        $gender = $conn->query("SELECT gender FROM employees WHERE emp_no = $empId")->fetchAll(PDO::FETCH_ASSOC)[0]['gender'];
        $hireDate = $conn->query("SELECT hire_date FROM employees WHERE emp_no = $empId")->fetchAll(PDO::FETCH_ASSOC)[0]['hire_date'];

        echo "<h1>Employee: ".$firstName." ".$lastName."</h1>";
        if ($gender == "M") echo "<h1>gender: Male</h1>";
        if ($gender == "F") echo "<h1>gender: Female</h1>";
        echo "<h1>Birth date: ". $birthDate . "</h1>";
        echo "<h1>Hire date: ". $hireDate . "</h1>";

      }
      catch(PDOException $e){
        echo "Unknown Username <br>";
      }

?>
</body>
</html>