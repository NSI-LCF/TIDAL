<?php 
function getAbsences($date){
    //affiche tous les absents
    global $dbh;
    $sql = "SELECT * FROM `absences` where `end_date` > '$date'  ";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll();    
}
?>