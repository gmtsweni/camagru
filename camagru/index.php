<?php
session_start();
echo "" . $_SESSION['username'];
if (isset($_POST['logout'])){
    session_start();
    session_destroy();

    header('location: login.php');
}
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Welcome</h2>
    </div>
    <form method="post" action="logout.php">
        <div class="input-group">
            <button type="submit" name="logout" class="btn">Logout</button>
        </div>
    </form>
</body>
</html>

<!--?php
 Initialize the session
session_start();
 
 If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><!-?php echo $_SESSION['username']; ?></b>. Welcome to our site.</h1>
    </div>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html-->