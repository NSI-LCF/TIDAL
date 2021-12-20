<?php 
function updateCantine($semaine,$jour,$horaire,$classes){
    global $dbh;
    $sql = "UPDATE `cantine` SET `classes`='$classes' where semaine = $semaine and jour = $jour and horaire = $horaire ";
    $sth = $dbh->prepare($sql);
    $sth->execute(); 
}
?>
?>