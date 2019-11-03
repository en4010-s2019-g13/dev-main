<?php
function add_user($connection, $un, $pw)
{
    $stmt = $connection->prepare('INSERT INTO users VALUES(?,?)');
    $stmt->bind_param('ss', $un, $pw);
    $stmt->execute();
    $stmt->close();
}

function logOut(){
    session_start();
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

}
?>