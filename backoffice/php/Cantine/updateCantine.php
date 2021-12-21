<?php 
function updateCantine($semaine,$jour,$horaire,$classes){
    global $dbh;
    $sql = "UPDATE `cantine` SET `classes`=? where semaine = ? and jour = ? and horaire = ? ";
    $sth = $dbh->prepare($sql);
    $sth->execute([$classes,$semaine,$jour,$horaire]); 
}
?>
