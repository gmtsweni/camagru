<?php
include("server.php");
$user = $_SESSION['username'];
// Initialize the session
/* If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
  
}*/
?>

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
        <h1>Hi, <b><?php echo $username ?></b>. Welcome to our site. (:</h1>
    </div>
    <br />
    <p><a href="manu/home.php" class="btn btn-danger">click to continue</a></p>
</body>
</html>