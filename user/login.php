<?php
    session_start();

    if(isset($_SESSION["user"]) || isset($_SESSION["admin"])){
        header("Location: /index.php");
    }

    require_once '../components/db_connect.php';
    require_once '../components/clean.php';

    $usernameError = "";
    $passError = "";

    echo $_SESSION["user"]??"no user";

    if(isset($_POST["login"])){
        $username = clean ($_POST["login"]);
        $password = clean ($_POST["password"]);

        if(empty($username)){
            $error = true;
            $usernameError = "Username cannot be empty. Please enter a username.";
        }

        if(empty($password)){
            $error = true;
            $passError = "Password cannot be empty. Please enter a password.";
        }

        if(!$error){
            $pass = hash("sha256", $pass);

            $sql == "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$pass'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row["status"] === "user"){
                    $_SESSION["user"] = $row["id"];
                    header("Location: /index.php");
                }
                elseif($row["status"] === "admin"){
                    $_SESSION["adm"] = $row["id"];
                    header("Location: /user/dashboard.php");
                }
            }
            else{
                echo "
                <div class='alert alert-danger' role='alert'>
                    Either Username or password is either wrong or user does not exist!
                </div>";
            }
        }
    }
    
    mysqli_close($conn);

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

    <div class="container card-body">
        <form action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post">
        <label>
            Username:
            <input type="username" name="username" class="form-control">
            <span><?= $usernameError; ?></span>
        </label><br><hr>
        <label>
            Password:
            <input type="password" name="pass" class="form-control">
            <span><?= $passError; ?></span>
        </label><br><hr>
        <input type="submit" value="Log-in" name="login" class="btn btn-outline-success"><hr>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>