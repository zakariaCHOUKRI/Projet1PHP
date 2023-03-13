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
    <form action="update_salary.php" method="post">
        <label for="search_id">Enter Employee ID</label>
        <input type="text" name="search_id" id="search_id">
        <label for="salary">Enter the new salary</label>
        <input type="text" name="salary" id="salary">
        <input type="submit" class="btn btn-primary btn-block submit-btn" value="submit">
    </form>
    
    <?php
    include 'dbConfig.php';

    if (isset($_POST["search_id"]) && isset($_POST["salary"])){
        $empnumber = $_POST["search_id"];
            $myQuery1 = "UPDATE salaries SET salary = ".$_POST["salary"]." WHERE emp_no = ".$_POST["search_id"];
            $getSalaryQuery = "SELECT s1.salary FROM (SELECT s2.salary FROM salaries s2 WHERE s2.emp_no = $empnumber) as s1 WHERE s1.to_date = (SELECT MAX(s1.to_date))"
            
            $conn->query($myQuery1);
            if ($_SESSION["empId"] == 10001) {
            echo "salary changed";
            } 
            else {
                echo "You don't have the permission to do that";
            }
    }

    ?>
</body>
</html>