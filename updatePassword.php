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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>html,body { height: 100%; }

body{
	display: -ms-flexbox;
	display: -webkit-box;
	display: flex;
	-ms-flex-align: center;
	-ms-flex-pack: center;
	-webkit-box-align: center;
	align-items: center;
	-webkit-box-pack: center;
	justify-content: center;
	background-color: #f5f5f5;
}

form{
	padding-top: 10px;
	font-size: 13px;
	margin-top: 30px;
}

.card-title{ font-weight:300; }

.btn{
	font-size: 13px;
}

.login-form{ 
	width:320px;
	margin:20px;
}

.sign-up{
	text-align:center;
	padding:20px 0 0;
}

span{
	font-size:14px;
}

.submit-btn{
	margin-top:20px;
}</style>
    <title>Update Password</title>
</head>
<body>
<form action="updatePassword.php" method="post">
<div class="card login-form">
	<div class="card-body">
        
		<h3 class="card-title text-center">Change password</h3>
            
		<!--Password must contain one lowercase letter, one number, and be at least 7 characters long.-->
				<div class="form-group">
					<label for="exampleInputEmail1">Your new password</label>
					<input type="password" class="form-control form-control-sm pass1" name="pass1">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Repeat password</label>
					<input type="password" class="form-control form-control-sm pass2" name="pass2">
				</div>
				<button type="submit" class="btn btn-primary btn-block submit-btn">Confirm</button>
                <?php
                include 'dbConfig.php';
                if (isset($_POST["pass1"]) && isset($_POST["pass2"])){
                    if ($_POST["pass1"] == $_POST["pass2"]){
                        $myQuery1 = "UPDATE employees SET passcode = '".$_POST["pass1"]."' WHERE emp_no = ".$_SESSION["empId"];
                        $myQuery2 = "UPDATE employees SET is_changed = 1 WHERE emp_no = ".$_SESSION["empId"];
                        $conn->query($myQuery1);
                        $conn->query($myQuery2);
                        if ($_SESSION["empId"] != 10001) {
						header("Location: employeeDashboard.php");
						} else {
							header("Location: admin.php");
						}
                    }
                    else{
                        echo "Passwords do not match !";
                    }
                }
                ?>
			</form>
		</div>
	</div>
</div>

</body>

</html>