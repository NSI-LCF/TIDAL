<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} else {
    if (isset($AdminRequired) && ($AdminRequired == true)) {
        $User = unserialize($_SESSION['user']);
        if ($User->type != 1) {
            header("Location: index.php");
            exit;
        }
    }
}