<?php 
function updateSemaine($semaine,$type){
    global $dbh;
    $sql = "UPDATE `semaines` SET `type`=? where semaine = ? ";
    $sth = $dbh->prepare($sql);
    $sth->execute([$type,$semaine]);
}
?>
