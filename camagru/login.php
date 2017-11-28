<!-- https://www.youtube.com/watch?v=xnSKohfSR4A-->

<?php
session_start();
require_once('load.php');
if (isset($_POST['login']) && $_POST['login'] == "login")
{
    /*$password = 'Iam here for you\n';
    echo $password;*/
    if (isset($_POST['login']))
    {
        $error = array();
        if (empty($_POST['Username']))
            $error[] = 'Please enter Username';
        else
            $username = $_POST['Username'];
        if (empty($_POST['Password']))
            $error[] = 'Please enter Password';
        else
            $password = $_POST['Password'];
        if (empty($error))
        {
            $password = hash('whirlpool', $password);
            $query = "SELECT * FROM camagru_users WHERE Username = '$username' AND Password = '$password'";
            $res = $conn->query($query);
            if (!$res)
                echo "Database not found";
            if ($res == 0)
            {
                echo 'No such user found';
            }
            else
            {
                session_start();
                $_SESSION['user'] = $username;
                header("Location: main.php");
            }
        }
        else
        {
            foreach ($error as $key => $value)
            echo '<li>' . $value . '</li>';
        }
    }
}
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>
    <form method="post" action="welcome.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="input-group">
            <button type="submit" name="login" class="btn">Login</button>
        </div>
     <p>
         Not yet a member? <a href="register.php">Register<a/>
    </p>
    </form>
</body>
</html>