<?php

if(!isset($_SESSION)) 
{ 
    session_start();

    if ($_SESSION["empId"] != 10001) {
        header("Location: index.php");
    }
}

include 'dbConfig.php';

try{
    $lastID = $conn->query("SELECT max(emp_no) FROM employees")->fetchAll(PDO::FETCH_ASSOC)[0]['max(emp_no)'];
    $thisId = $lastID + 1;

    $conn -> query()

  }
  catch(PDOException $e){
    echo "Unknown Username <br>";
  }

?>