<?php
session_start();
    
    include("connection.php");
    include("functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password))
        {
            //read from database
            $query = "select * from users where email = '$email' and password = '$password' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['email'] == $email && $user_data['password'] == $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: home.html");
                        die;
                    }
                }
            }

           echo "<script>alert('Invalid email or password. Please try again!')</script>";
        } else
        {
            echo "Please enter both email and password.";
        }
    }

?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
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
        <h5>Log in</h5>
        <div class="inputs">
            <form method="post">
            <input id="text" type="text" name="email" placeholder="Email">
            <br>
            <input id="password" type="password" name="password" placeholder="Password">
        </div>
        <br>
        <p>Don't have an account? <a href="signup.php">Signup</a></p>
            <br>
            <button>Log in</button>
    </div>
    </form>
</div>
</body>
</html>