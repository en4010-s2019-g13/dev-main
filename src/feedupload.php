<?php

    require_once 'db_connect.php';
    require_once 'functions.php';

    if (empty($_POST["date"])) 
    {
        $date = "";
    }
    else 
    {
        $date = test_input($_POST["date"]);
    }    

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
    
    $target_file = upload_image();

    $stmt = $connection->prepare('INSERT INTO feeds VALUES(?,?,?,?)');
    $stmt->bind_param('ssss', $date, $location, $explanation, $target_file);
    $stmt->execute();
    $stmt->close();

    header("Location: ../public_html/feed.php");
?>