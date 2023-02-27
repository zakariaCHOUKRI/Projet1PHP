<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="Assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="landing">
<button class="signup">Sign Up</button>
<button class="login">Log in </button>
    </div>
    <div class="loginForm dp-none">
    <h1>Login</h1>
<form method="GET" action = "index.php" >
    <div class="i i1">
    <label for="email">Email</label>
<input type="email" name="email" id="email">

    </div>
    <div class="i i2">
    <label for="password">Password</label>

    <input type="password" name="password" id="password" required>
    </div>
<input type="submit" value="submit" class="submit">
</form>
        <button class="x">X</button>
    </div>
</body>
<script>
$(".login").on("click",function(){
    $(".loginForm").css("display","block");
    $(".landing").css("display","none");
});
$(".x").on("click",function(){
    $(".loginForm").css("display","none");
    $(".landing").css("display","flex");
});
</script>
</html>
