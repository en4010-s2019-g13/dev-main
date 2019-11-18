<?php

    require_once 'db_connect.php';
    require_once 'functions.php';

    $reportID = $_POST['reportID'];
    $sql = "DELETE FROM reports WHERE reportID = $reportID";

// currently, this script just removes the reports from the database
// for later, maybe add quick things like confirmation, send user notification, etc.

// should probably remove reports from active reports database and into historical database
if ($connection->query($sql) === TRUE) 
{
    echo "Record deleted";
} 
else 
{
    echo "Error deleting record: " . $connection->error;
}

header("Location: ../public_html/reportinbox.php");

?>