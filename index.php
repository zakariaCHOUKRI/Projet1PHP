<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
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
      <form action="dbConfig.php" method="post" class="form-group">
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
        
    </div>
  </body>
</html>