<?php
    session_start();

    if ((!isset($_SESSION["user"]) && !isset($_SESSION["admin"])) || isset($_SESSION["user"])) {
        header("Location: /index.php");
    }

    require_once '../components/db_connect.php';
    require_once '../components/upload.php';

    $options = "";

    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST["create"])) {
        $name = $_POST["name"];
        $picture = fileUpload($_POST["picture"], "animals");
        $animal_type = $_POST["animal_type"];
        $breed = $_POST["breed"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $description = $_POST["description"];
        $size = $_POST["size"];
        $vaccinated = $_POST["vaccinated"];
        $address = $_POST["name"];
        $status = $_POST["status"];

        $sql = "INSERT INTO `animals`(`name`, `picture`, `animal_type`, `breed`, `age`, `gender`, `description`, `size`, `vaccinated`, `address`, `status`) VALUES ('$name', '{$picture[0]}', '$animal_type', '$breed', '$age', '$gender', '$description', '$size', '$vaccinated', '$address', '$status')";

        if(mysqli_query($conn, $sql)) {
            echo "
                <div class='alert alert-success' role='alert'>
                    Success! {$picture[1]}
                </div>";
                header("refresh: 3;");
        }
        else {
            echo "
                <div class='alert alert-danger' role='alert'>
                    Oops! Something went wrong. {$picture[1]}
                </div>";
        }
    }

    mysqli_close($conn);
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