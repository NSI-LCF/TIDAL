<?php
session_start();
include('conf.php');
function add_user($user_name, $password)
{
    global $dbh;
    $sql="INSERT INTO utilisateur (username, password) VALUES (?,?)";
    $yes= $dbh->prepare($sql);
    $yes->execute([$user_name, $password]);
    
};
?>