<?php
// Example 26-7: login.php
require_once "db_connect.php";
require_once "functions.php";
$error = $user = $pass = "";

if (isset($_POST['create_account_submit'])) {
    $user = $_POST['new-user'];
    $pass = $_POST['new-pass'];

    if ($user == "" || $pass == "")
        $error = 'Not all fields were entered';
    else {//??
        $result = $connection->query("SELECT username FROM users
        WHERE username='$user'");

        if ($result->num_rows == 0) {
            //insert to database
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            add_user($connection, $user, $hash);

            //login
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("Location: ../public_html/index.php");
            //die("valid");
        } else {
            die("invalid");

        }
    }
}
//$_POST['test'] = "test";
//print_r($_POST);
//redirect
//header("Location: ../public_html/home/index.php");

// function sanitizeString($var)
//   {
//     global $connection;
//     $var = strip_tags($var);
//     $var = htmlentities($var);
//     if (get_magic_quotes_gpc())
//       $var = stripslashes($var);
//     return $connection->real_escape_string($var);
//   }

