<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !is_numeric($first_name) && !is_numeric($last_name) && ($password == $confirm_password))
    {
        //save to database
        $query = "INSERT INTO users (user_id, first_name, last_name, email, password, confirm_password) VALUES ('$user_id', '$first_name', '$last_name', '$email', '$password', '$confirm_password')";
        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        
        if($password != $confirm_password) {
            echo "<script>alert('Password do not match. Please try again!')</script>";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="./signlog.css">
</head>
<body>
<div class="box-form">
    <div class="left">
        <div class="overlay">
            <h1>BEAN BLVD.</h1>
            <p>Stop settling for less, have an affair with our café</p>
        </div>
    </div>
    <div class="right">
        <h5>Sign up</h5>
        <div class="inputs">
            <form method="post">
                <input id="text" type="text" name="first_name" placeholder="First Name" required>
                <br>
                <input id="text" type="text" name="last_name" placeholder="Last Name" required>
                <br>
                <input id="email" type="email" name="email" placeholder="Email" required>
                <br>
                <input id="password" type="password" name="password" placeholder="Password" required>
                <br>
                <input id="password" type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <br>
            <p>Already have an account? <a href="login.php">Log in</a><br></p>
            <br>
            <button type="submit">Sign up</button>
        </form>
    </div>
</div>
</body>
</html>
