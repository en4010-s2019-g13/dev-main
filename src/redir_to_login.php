<?php
session_start();
if (!isset($_SESSION['user']))
{
    header("Location: ../public_html/login_required.php");
    die();
}
