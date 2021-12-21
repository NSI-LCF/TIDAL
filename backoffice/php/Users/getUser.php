<?php 
function getUser($username,$password){
    //checks for login credentials and returns the data if there is data
    global $dbh;
    $sql = "SELECT id,username FROM `users` WHERE `UserName` = '$username' AND `pwd` = '$password' LIMIT 1";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth->fetch();    
}


?>