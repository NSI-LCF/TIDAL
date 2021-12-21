<?php 
function updateSemaine($semaine,$type,){
    global $dbh;
    $sql = "UPDATE `cantine` SET `type`=? where semaine = ? ";
    $sth = $dbh->prepare($sql);
    $sth->execute([$type,$semaine]); 
}
?>
