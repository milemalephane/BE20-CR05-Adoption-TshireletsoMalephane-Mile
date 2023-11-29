<?php
    session_start();

    if(isset($_SESSION["user"]) || isset($_SESSION["admin"])){
        header("Location: /index.php");
    }

    require_once '../components/db_connect.php';
    require_once '../components/clean.php';

    
    $usernameError = "";
    $emailError = "";
    $passError = "";

    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $error = false;

        if(empty($username)){
            $error = true;
            $usernameError = "Usernaeme cannot be empty. Please enter a username.";
        }
        elseif(strlen($username)< 3){
            $error = true;
            $usernameError = "Usernaeme must be at least 3 characters long.";
        }

        if(empty($email)){
            $error = true;
            $emailError = "Please enter your email address.";
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Email cannot be empty.";
        }
        else{
            $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) !== 0){
                $error = true;
                $emailError = "Email is linked to another account.";
            }
        }

        if(empty($pass)){
            $error = true;
            $passError = "Password cannot be empty. Please enter a password.";
        }
        elseif(strlen($pass)< 8){
            $error = true;
            $passError = "Password must be at least 8 characters long.";
        }

        if($error === false){
            $pass = hash("sha256", $pass);

            $sql = "INSERT INTO `users`(`username`, `email`, `pass`) VALUES ('$username', '$email', '$pass')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "
                <div class='alert alert-success' role='alert'>
                    New user created successfully!
                </div>";
                header("Location: /index.php");
            }
            else{
                echo "
                <div class='alert alert-success' role='alert'>
                    Oops! Something went wrong!
                </div>";

            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <?php require_once '../components/navbar.php' ?>

    <div class="container">
        <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>
                    Username:
                    <input type="username" name="username" class="form-control">
                    <span><?= $usernameError; ?></span>
            </label>
            </div>
            <div class="mb-3">
            <label>
                Email:
                <input type="email" name="email" class="form-control">
                <span><?= $emailError; ?></span>
            </label>
            </div>
            <div class="mb-3">
            <label>
                Password:
                <input type="password" name="pass" class="form-control">
                <span><?= $passError; ?></span>
            </label>
            </div>
        <input type="submit" value="Register" name="register" class="btn btn-outline-success">
        </form>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>