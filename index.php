<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="script.js"></script>
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="text-center">Login</h1>
      <form action="index.php" method="post" class="form-group">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary btn-block">
      </form> 
    </div>
    <div>
        <?php
        //$myAction = "";
        $username = "root";
        $password = "";
        $hostname = "localhost";
        //connection to the database
        //$dbConnect = mysqli_connect($hostname, $username, $password);
        // try to create connection
        try {
            $conn = new PDO("mysql:host=".$hostname.";dbname=employees", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            echo "<br>";
            }
            // show an error if the connection was unsuccessful
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
          
          $queryTest = "SELECT * FROM employees LIMIT 5";

          $res = $conn->query($queryTest);
          
          if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])){
            echo "sdfsd";
            $empUsername = $_POST['username'];
            try{
              $empNo = $conn->query("SELECT password FROM employees WHERE emp_no = $empUsername")->fetchAll(PDO::FETCH_ASSOC)[0]['password'];
              $empBirth = $conn->query("SELECT birth_date FROM employees WHERE emp_no = $empUsername")->fetchAll(PDO::FETCH_ASSOC)[0]['birth_date'];
              echo $empNo == $empBirth;
            }
            catch(PDOException $e){
              echo "Unknown Username <br>";
            }
            
            
          }
          // foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row){
          //   print_r($row);
          //   echo "<br>";
          // }
          //print_r($res->fetchAll());
          //echo $res->rowCount();
    
          
    
        ?>
    </div>
  </body>
</html>