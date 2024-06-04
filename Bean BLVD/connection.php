<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bb";

if (!$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname))
{
    die ("Failed to connect!");
}

