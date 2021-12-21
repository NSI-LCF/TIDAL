<?php 
//ajoute un prof a la table des absents
function addAbsence($name,$begin_date, $end_date){
    global $dbh;
    $sql = "INSERT INTO absences (name, begin_date, end_date) VALUES (?,?,?)";
    $sth = $dbh->prepare($sql);
    $sth->execute([$name,$begin_date,$end_date]);
};

?>