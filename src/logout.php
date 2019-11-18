<?php
require_once "../src/functions.php";
if (isset($_POST['logout'])) {
    logOut();
    echo "logged out";
    header("Location: ../public_html/index.php");
}
else{
    echo "no log";
    //redirect
    header("Location: ../public_html/index.php");
}

//redirect

?>
