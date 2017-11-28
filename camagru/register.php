<?php session_start();
require_once('load.php');
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password_1']. "ALSS2KAO09");
$conpassword = md5($_POST['password_2']. "ALSS2KAO09");
$fullname = $_POST('fullname');
if(isset($_POST['submited'])){
    if(isset($username, $email, $password, $conpassword)){
        if(strstr($email,"@")){
            if($password == $conpassword){
                $query = $dbc->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
                $query = $query->execute(array(
                    $username,
                    $email
                ));
                $count = mysql_num_rows($query);
                if($count == 0)
                {
                    $query = $dbc->prepare("INSERT INTO users SET username = ?, email = ?, password = ?");
                    $query = $query->execute(array(
                        $username,
                        $email,
                        $password
                    ));
                    if($query){
                        echo"Account registered succeesfull.";
                        header('location: welcome.php');
                    }
                }else{
                    echo "User already exits";
                }
            }else{
                echo "password doesn't match";
            }
        }else{
            echo "invalid email address!!";
        }
    }
}
print_r($error);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form method="post" action="register">
    <div class="input-group">
        <label>Full name</label>
      <input type="text" placeholder="Enter your full name" name="fullname" required>
        </div>
     <div class="input-group">
        <label>Username</label>
        <input type="text" placeholder="Enter username" name="username">
     </div>
        <div class="input-group">
        <label>Email</label>
      <input type="email" placeholder="Enter your email" name="email" required>
        </div>
       <div class="input-group">
        <label>Password</label>
        <input type="password" placeholder="Enter password" name="password_1">
       </div>
       <div class="input-group">
       <label>Confime Password</label>
       <input type="password" placeholder="Re-enter password" name="password_2" required>
      </div>
     <div class="input-group">
     <button type="submit" name="submited" class="btn">Register</button>
     </div>
     <p>
         Already a member? <a href="login.php">Sign in<a/>
    </p>
</body>
</html>