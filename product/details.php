<?php
    require_once '../components/db_connect.php';

    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $sql = "SELECT * FROM `animals` WHERE `id` = $_GET[id]";
        $result = mysqli_query($conn, $sql);

        $cards ="";

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $cards .= "<div>
            <div class='card gap-3 mt-5 mb-5 shadow' style='width: 25rem;'>
            <img src='../assets/images/{$row["picture"]}' class='card-img-top' alt='...' style='height: 30vh;'>
            <div class='card-body'>
            <h4 class='card-title mb-4 text-center d-flex align-items-center justify-content-center' style='height: 12rem;' >{$row["name"]}</h4>
            <hr class='card-body'>
            <p class='card-text mt-5'><b>Animal Type:</b> <br> {$row["animal_type"]}</p>
            <p class='card-text mt-5'><b>Breed:</b> <br> {$row["breed"]}</p>
            <p class='card-text mt-5'><b>Age:</b> <br> {$row["age"]}</p>
            <p class='card-text mb-5'><b>Size:</b><br> {$row["size"]}</p>
            <p class='card-text mb-5'><b>Gender:</b><br> {$row["gender"]}</p>
            <p class='card-text mb-5'><b>Description:</b><br> {$row["description"]}</p>
            <p class='card-text mb-5'><b>Vaccinated:</b><br> {$row["vaccinated"]}</p>
            <p class='card-text mb-5'><b>Address:</b><br> {$row["address"]}</p>
            <p class='card-text mb-5'><b>Status:</b><br> {$row["status"]}</p>
            <div class='buttons text-center'> 
                <a href='/users/adopt-a-pet.php.php?x={$row["id"]}' class='btn btn-dark'>Adopt</a>
            </div>
            </div>
            </div>
            </div>";
        }
    }
    else {
        $cards .= "No Results";
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

    <div class="container">
        <?= $cards ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>