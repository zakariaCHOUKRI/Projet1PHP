<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
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
          
          if (isset($_POST['username']) && !empty($_POST['username'])){
            $empUsername = $_POST['username'];
            
            try{
              $empPass = $conn->query("SELECT passcode FROM employees WHERE emp_no = $empUsername")->fetchAll(PDO::FETCH_ASSOC)[0]['passcode'];
              $empPassEntered = $_POST['password'];
              $_SESSION['empId'] = $empUsername;
              echo $empPass;
              echo $empPassEntered;
              echo "<br>";
              echo $empPass == $empPassEntered;
              
              if ($empPass == $empPassEntered){
                $changed = $conn->query("SELECT is_changed FROM employees WHERE emp_no = $empUsername")->fetchAll(PDO::FETCH_ASSOC)[0]['is_changed'];
                echo $empPass;
                if ($changed == 0){
                    header("Location: updatePassword.php");
                }
                else{
                  if ($empUsername != 10001) {
                    header("Location: employeeDashboard.php");
                    } else {
                      header("Location: admin.php");
                    }
                }

              } 
              else {
                header("Location: index.php?fail=true");
              }
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