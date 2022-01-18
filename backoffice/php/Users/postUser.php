<?php 
//create user
function createUser($username, $password, $typ){
    global $dbh;
    $sql = "INSERT INTO users (username, password, type) VALUES (?,?,?)";
    $sth = $dbh->prepare($sql);
    $sth->execute([ $username, hash("sha256", $password), $typ]);
};

?>