<?php 
function getUsers(){
    //affiche tous les utilisateurs
    global $dbh;
    $sql = "SELECT * FROM `users`";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll();    
}


?>