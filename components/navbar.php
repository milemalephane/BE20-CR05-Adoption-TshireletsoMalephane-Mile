<?php
echo "
<nav class='navbar navbar-expand-lg bg-body-tertiary'>
<div class='container-fluid'>
    <a class='navbar-brand' href='/index.php'>Navbar</a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNav'>
    <ul class='navbar-nav'>
        <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='/index.php'>Home</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='/seniors.php'>Seniors</a>
        </li>";
        if(isset($_SESSION["admin"])){
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='/user/dashboard.php'>Dashboard</a>
            </li>

        
        <li class='nav-item'>
            <a class='nav-link' href='/product/create.php'>Create</a>
        </li>";
        }
        if(isset($_SESSION["user"]) || isset($_SESSION["admin"])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='/user/register.php'>Register</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='/user/login.php'>Log-in</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='/user/logout.php'>Log-out</a>
        </li>";}
    echo "</ul>
    </div>
</div>
</nav>
";
?>

