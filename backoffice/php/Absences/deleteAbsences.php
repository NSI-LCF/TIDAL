<?php 
function deleteAbsence($id){
    //enleve prof de la table absences
    global $dbh;
    $sql = "DELETE FROM `absences` WHERE id=?";
    $sth = $dbh->prepare($sql);
    $sth->execute([$id]);
}
?>