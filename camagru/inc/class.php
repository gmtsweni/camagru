<?php
    if (!class_exists('camagru_class')) {
        class camagru_class {
            function register($redirect) {
                global $db_camgru;

                require_once( 'db.php' );
                $table = "camagru_users";

                $fields = array( 'name', 'username', 'email', 'password');
                $values = $db_camgru->clean($_POST);

                $username = $_POST['username'];
                $userlogin = $_post['name'];
                $userpass = $_POST['password'];
                $useremail = $_POST['email'];

                $nonce = md5('registration-' . $userlogin . $userlogin . $userreg . NONCE_SALT);

                $userpass = $db_camgru->hash_password($userpass, $nonce);

                $values = array(
                    'name' => $userlogin,
                    'username' => $username,
                    'email' => $useremail,
                    'password' => $userpass,
                );

                $insert = $db_camgru->insert($link, $table, $fields, $values);

                if ( $insert ) {
                    $subject = "Acticate your camagru account";
                    $message = "
                    Thank you for registering Camagru with us.
                    <br>
                    <br>
                    Please verify your account by clicking the link below <br>

                    <button type='submit' class='btn btn-primary btn-block'><a href='http://127.0.0.1:8080/camagru/verify.php?user=$userlogin'></a>/button>
                    <br>
                    <br>
                    Kind regards<br>
                    Camagru Team
                    ";

                    $head = 'Content-type: text/html; charset=UTF-8' . "\r\n";

                    mail($usermail, $subject, $message, $head);
                    //Redirect and send an alert to point what's next after login
                    $url = "http" . ((empty($_SERVER['HTTPS'])) ? "s" : "") . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQEST_URI'];
                    $aredirect = str_replace('index.php', $redirect, $url);
                    header("Location: $redirects?reg=true");
                }
                else {
                    echo "<script type='text/javascript'>alert('USER NOT CREATED')</script>";
                }
            }

            function login( $redirect ) {
                global $db_camgru;

                $link = new PDO("mysql:host=localhost;dbname=" .  DB_NAME. DB_USER, DB_PASS);
                if ( !empty($_POST) ) {
                    $subname = $_POST['log_userlogin'];
                    $subpass = $_POST['log_password'];

                    $table = 'camagru_users';

                    $sql = "SELECT * FROM $table WHERE user_login=$subname OR user_email=$subname";
                    $link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
                    $sth = $link->prepare( $sql );
                    $sth->execute();
                    $results = $sth->fetchAll(PDO::FETCH_ASSOC); 

                    $storeg = $results[0]['user_register'];
                    $nonce = md5('registration-' . $subname . $storeg . NONCE_SALT);
                    $authID = $db_camgru->hash_password($subpass. $authnonce);

                    if ($subpass == $stopass && $results[0]['user_confirm'] == 1) {
                        $authnonce = md5('cookie-' . $subname . $storeg . AUTH_SALT);
                        $authID = $db_camgru->hash_password( $subpass, $authnonce );

                        setcookie('camlogauth[user]', $subname, 0, '', '', '', true);
                        setcookie('camlogauth[authID]', $authID, 0, '', '', '', true);

                        $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                        $aredirect = str_replace('login.php?reg=true', $redirect, $url);
                        
                        header("Location: $redirect");
                        exit;
                    }
                    else {
                        if ($results[0]['user_confirm'] == 0) {
                            echo "<script type='text/javascript'>alert('Check your mail to confirm your account :)')</script>";
                        }
                        else {
                            echo "<script type='text/javascript'>alert('Username or password you entered is incorrect :(')</script>";
                        }
                    }
                }
            }
        }
    }
?>