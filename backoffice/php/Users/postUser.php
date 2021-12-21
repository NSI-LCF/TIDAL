<?php 
//create user
function createUser($username, $password){
    global $dbh;
    $sql = "INSERT INTO users (UserName, pwd) VALUES (?,?)";
    $sth = $dbh->prepare($sql);
    $sth->execute([$username, $password]);
};

?>