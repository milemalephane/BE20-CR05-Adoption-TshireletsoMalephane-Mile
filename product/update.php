<?php
    session_start();

    if(!isset($_SESSION["admin"])){
        header("Location: /index.php");
    }

    require_once '../components/db_connect.php';
    require_once '../components/fileUpload.php';

    $data = "";

    $sql = "SELECT * FROM `users` WHERE `status` != 'admin'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);

    $sqlUsers = "SELECT * FROM users";

    $resultUsers = mysqli_query($connect, $sqlUsers);

    $layout = "";

    if(mysqli_num_rows($resultUsers) > 0){
        while($userRow = mysqli_fetch_assoc($resultUsers)){
            $layout .= 
        "<div>
            <div class='card' style='width: 18rem;'>
                <img src='../images/{$userRow["picture"]}' class='card-img-top object-fit-cover' alt='user pic' width='100%' height='300'>
                <div class='card-body'>
                <h5 class='card-title'>{$userRow["first_name"]} {$userRow["last_name"]}</h5>
                <p class='card-text'>{$userRow["email"]}</p>
                <a href='update.php?id={$userRow["id"]}' class='btn text-white' id='upBtn'>Update</a>
            </div>
        </div>
    </div>";
        }
    }else {
        $layout .= "No results found!";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

    <?php require_once '../components/navbar.php' ?>

    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name" class="form-label">
                Name:
                <input type="text" name="name" class="form-control">
            </label>
            <label for="animal_type" class="form-label">
                Animal:
                <input type="text" name="animal_type" class="form-control">
            </label>
            <label for="breed" class="form-label">
                Breed:
                <input type="text" name="breed" class="form-control">
            </label>
            <label for="age" class="form-label">
                Age:
                <input type="text" name="age" class="form-control">
            </label>
            <label for="gender" class="form-label">
                Gender:
                <input type="text" name="gender" class="form-control">
            </label>
            <label for="size" class="form-label">
                Size:
                <input type="text" name="size" class="form-control">
            </label>
            <label for="vaccinated" class="form-label">
                Vaccinated:
                <input type="text" name="vaccinated" class="form-control">
            </label>
            <label for="description" class="form-label">
                Description:
                <input type="text" name="description" class="form-control">
            </label>
            <label for="address" class="form-label">
                Address:
                <input type="text" name="address" class="form-control">
            </label>
            <label for="status" class="form-label">
                Status:
                <input type="text" name="status" class="form-control">
            </label>
            <label for="picture" class="form-label">
                Picture:
                <input type="file" name="picture" class="form-control">
            </label>
            <input type="submit" value="create" name="create" class="btn btn-outline-success">
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>