<?php
    session_start();

    unset($_SESSION["user"]);
    unset($_SESSION["admin"]);

    session_unset();
    session_destroy();

    header("Location: /user/login.php");