<?php

    require_once 'db_connect.php';
    require_once 'functions.php';

    if (empty($_POST["explanation"])) 
    {
        $explanation = "";
    }
    else 
    {
        $explanation = test_input($_POST["explanation"]);
    }
    
    if (empty($_POST["location"])) 
    {
        $location = "";
    }
    else 
    {
        $location = test_input($_POST["location"]);
    }
    
    if(isset($_POST['submit']))
    {
        $priority = $_POST['priority']; 
    }
    else
    {
        $priority = "";
    }

    $target_file = upload_image();

    $stmt = $connection->prepare('INSERT INTO reports VALUES(?,?,?,?)');
    $stmt->bind_param('ssss', $priority, $location, $explanation, $target_file);
    $stmt->execute();
    $stmt->close();

    header("Location: ../public_html/report.php");
?>