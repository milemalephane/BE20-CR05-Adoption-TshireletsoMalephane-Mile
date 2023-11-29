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
        <form action="" method="post" enctype="multipart/form-data">
        <label>
            Username:
            <input type="username" name="username" class="form-control">
            <span><?= $usernameError; ?></span>
        </label>
        <label>
            Email:
            <input type="email" name="email" class="form-control" value="<?= $row["email"]??""; ?>">
            <span><?= $emailError; ?></span>
        </label>
        <label>
            Password:
            <input type="password" name="pass" class="form-control">
            <span><?= $passError; ?></span>
        </label>
        <input type="submit" value="Register" name="register" class="btn btn-outline-light">
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>