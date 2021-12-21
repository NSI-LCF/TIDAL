<?php
function getCantine($semaine,$jour,$horaire){
    global $dbh;
    $sql = "SELECT classes FROM `cantine` WHERE `semaine` = ? and `jour`=? and `horaire`=?";
    $sth = $dbh->prepare($sql);
    $sth->execute([$semaine,$jour,$horaire]);
    return $sth->fetch();   
}
?>