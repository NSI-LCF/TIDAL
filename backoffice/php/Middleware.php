<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} else {
    global $dbh;
    $User = unserialize($_SESSION['user']);

    // Check if user exists
    $sql = "SELECT * FROM `users` WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute([unserialize($_SESSION['user'])->id]);
    
    if ($sth->rowCount() == 0) {
        // User doesn't longer exist
        include_once './logout.php';
        exit;
    }

    // Check if last login was older than 14 400 secs or 4 hours
    if ($User->login_time + 14400 < time()) {
        // Disconnect user
        include_once './logout.php';
        exit;
    }

    // Check if page requires administrator and check user rights
    if (isset($AdminRequired) && ($AdminRequired == true)) {
        if ($User->type != 1) {
            header("Location: index.php");
            exit;
        }
    }
}