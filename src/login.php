<?php
require_once 'db_connect.php';
//add anti-sql-injection security features later
$error = $user = $pass = "";

if(isset($_POST['login_submit']))
{

    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user == "" || $pass == "")
        $error = 'Not all fields were entered';
    else
    {//??
        $result =$connection->query("SELECT username,password FROM users
        WHERE username='$user'");


        if($result->num_rows > 0)
        {
            $hash = $result->fetch_assoc()['password'];
            $correctPass = password_verify($pass, $hash);
            if($correctPass){
                //print_r($_POST);
                session_start();
                $_SESSION['user'] = $user;
                //$_SESSION['pass'] = $pass;
                header("Location: ../public_html/index.php");
                //die("valid");
            }
            else{
                die("invalid");
            }
        }

        else {
            die("invalid username");
        }
    }
}

else{

}
