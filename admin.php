<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/admin.css">
</head>
<body>
    <div class="sidebar">
<a href="#">Main</a>
<a href="add_employee.php">Add Employee</a>
<a href="">Change Employee Data</a>
    </div>
    <div class="main_data">
    </div>
    <?php
     $username = "root";
     $password = "";
     $hostname = "localhost";
     try{
        $conn = new PDO("mysql:host=".$hostname.";dbname=employees", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     }
     catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
        $queryAverageAge = "SELECT  avg(DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), birth_date)), '%Y'))
        FROM employees ;";
        $res = $conn->query($queryAverageAge);
        $birth_dates = $res->fetchAll(PDO::FETCH_ASSOC);
       $avg_age= (int)array_values($birth_dates[0])[0];
       print_r($avg_age);
       

       $queryAverageWork ="SELECT avg(DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), hire_date)), '%Y'))
       FROM employees ;";
       $res1 = $conn->query($queryAverageWork);
       $work_dates = $res1->fetchAll(PDO::FETCH_ASSOC);
       $avg_work = (int)array_values($work_dates[0])[0];
       echo "<br>";
        print_r($avg_work);

       $queryCountMEN = "SELECT count(gender)
       FROM employees
       WHERE gender='M';";
       $res2 = $conn ->query($queryCountMEN);
       $gender_count_M = $res2 -> fetchAll(PDO::FETCH_ASSOC);
       $count_M=  array_values($gender_count_M[0])[0];
       echo "<br>";
       print_r($count_M);

       $queryCountWOMEN = "SELECT count(gender)
       FROM employees
       WHERE gender='F';";
       $res3 = $conn ->query($queryCountWOMEN);
       $gender_count_F = $res3 -> fetchAll(PDO::FETCH_ASSOC);
       $count_F=  array_values($gender_count_F[0])[0];
       echo "<br>";
       print_r($count_F);
    ?>
</body>

</html>