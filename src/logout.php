<?php
require_once "../src/functions.php";
if (isset($_POST['logout'])) {
    logOut();
    echo "logged out";
    header("Location: ../public_html/home/index.php");
}
else{
    echo "no log";
    //redirect
    header("Location: index.php");
}

//redirect

?>
