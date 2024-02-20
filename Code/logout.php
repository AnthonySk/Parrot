<?php
session_start();


    $_SESSION = [];

    // DELETE COOKIE
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 99999, '/');
    }

    // DESTROY SESSION
    session_destroy();

    header("Location: index.php");
    exit;
