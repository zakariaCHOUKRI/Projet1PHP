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
        $departments = $conn->query("SELECT dept_name FROM departments")->fetchAll(PDO::FETCH_ASSOC);
        $titles = $conn->query("SELECT DISTINCT title FROM titles")->fetchAll(PDO::FETCH_ASSOC);

        $deptsList = [];
        $titlesList = [];

        for($i = 0; $i < count($departments); $i++) {
          array_push($deptsList, $departments[$i]['dept_name']);
        }

        for($i = 0; $i < count($titles); $i++) {
          array_push($titlesList, $titles[$i]['title']);
        }


      }
      catch(PDOException $e){
        echo "Unknown Username <br>";
      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        .all {
            width: 50%;
            margin: auto;
            border-radius: 5px;
            border: 1px solid black;
            padding: 32px;
        }
    </style>
</head>
<body> <div class="all">
<form action="addOperation.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6 my-4">
      <label for="fname">First Name</label>
      <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
    </div>
    <div class="form-group col-md-6 my-4">
      <label for="lname">Last Name</label>
      <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
    </div>
    <div class="form-group col-md-6 my-4">
      <label for="birthdate">Birth Date</label>
      <input type="date" class="form-control" id="bdate" placeholder="Birth Date" name="birth_date">
    </div>
    <div class="form-group col-md-6 my-4">
      <label for="gender">Gender</label>
      <select class="form-select" aria-label="Default select example" id="gender" name="gender">
        <option selected disabled>--- Open the Gender menu ---</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>
    <div class="form-group col-md-6 my-4">
      <label for="salary">Salary</label>
      <input type="number" class="form-control" name="salary" id="salary" placeholder="Salary" min="0">
    </div>
    <div class="form-group col-md-6 my-4">
      <label for="department">Department</label>
      <select class="form-select" aria-label="Default select example" id="department" name="department">
  <option selected disabled>--- Open the Departments menu ---</option>
  <?php
    for($i = 0; $i < count($deptsList); $i++) {
      echo "<option value=".$deptsList[$i].">".$deptsList[$i]."</option>";
    }
  ?>
</select>
    </div>
    <div class="form-group col-md-6 my-4">
      <label for="title">Title</label>
      <select class="form-select" aria-label="Default select example" id="title" name="title">
      <option selected disabled>--- Open the titles menu ---</option>
  <?php
    for($i = 0; $i < count($titlesList); $i++) {
      echo "<option value=".$titlesList[$i].">".$titlesList[$i]."</option>";
    }
  ?>
</select>    </div>
  </div>
  <div style="margin-top: 10px">
  <button type="submit" class="btn btn-primary">Sign in</button></div>
</form></div>
</body>
</html>