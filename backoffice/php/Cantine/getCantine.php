<?php
function getCantine($semaine,$jour,$horaire){
    global $dbh;
    $sql = "SELECT classes FROM `cantine` WHERE `semaine` = '$semaine' and `jour`='$jour' and `horaire`=$horaire";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth->fetch();   
}
?>