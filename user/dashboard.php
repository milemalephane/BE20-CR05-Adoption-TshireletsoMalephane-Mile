<?php
    session_start();

    if(!isset($_SESSION["admin"])){
        header("Location: /index.php");
    }

    require_once '../components/db_connect.php';

    $cards ="";

    $sql = "SELECT * FROM `animals` WHERE `status` != 'admin'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $cards .= "<div>
            <div class='card gap-3 mt-5 mb-5 shadow' style='width: 18rem;'>
            <img src='../images/{$row["picture"]}' class='card-img-top' alt='...' style='height: 30rem;'>
            <div class='card-body'>
            <h4 class='card-title mb-4 text-center d-flex align-items-center justify-content-center' style='height: 8rem;' >{$row["name"]}</h4>
            <hr class='TitleHR'>
            <p class='card-text mt-5'><b>Age:</b> <br> {$row["age"]}</p>
            <p class='card-text mb-5'><b>Size:</b><br> {$row["size"]}</p>
            <div class='buttons text-center'> 
                <a href='details.php?x={$row["id"]}' class='btn btn-dark'>Details</a>
                <a href='edit.php?x={$row["id"]}' class='btn btn-warning'>Edit</a>
                <a href='delete.php?x={$row["id"]}' class='btn btn-danger'>Delete</a>
            </div>
            </div>
            </div>
            </div>";
        }
    }
    else{
        $cards = "No data found.";
    }

    $data = "";

    $sql = "SELECT * FROM users`` WHERE `status` != 'admin'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $data .= "
                <tr>
                    <th scope='row'>$row[id]</th>
                    <td>$row[username]</td>
                    <td>$row[email]</td>
                    <td><a href='/user/update.php?id=$row[id]' class='btn btn-warning'>Update</a></td>
                </tr>
            ";
        }
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
    <?php require_once 'components/navbar.php' ?>

    <div class="row row-cols-1 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
        <?= $cards ?>
    </div>

    <div class="container">
        <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">username</th>
            <th scope="col">email</th>
            <th scope="col">actions</th>
        </tr>
    </thead>
    <tbody>
        <?= $data; ?>
    </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>