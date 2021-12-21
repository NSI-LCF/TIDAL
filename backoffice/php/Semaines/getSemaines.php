<?php 
function getSemaine($type){
    //affiche toutes les semaines
    global $dbh;
    $sql = "SELECT * FROM `semaines` where `type`=?";
    $sth = $dbh->prepare($sql);
    $sth->execute([$type]);
    return $sth->fetchAll();    
}
?>