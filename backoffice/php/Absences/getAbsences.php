<?php 
function getAbsences(){
    //affiche tous les absents
    global $dbh;
    $sql = "SELECT * FROM `absences`";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll();    
}
?>