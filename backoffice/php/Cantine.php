<?php
class Cantine {
    public function get($semaine, $jour, $horaire){
        global $dbh;

        $sql = "SELECT classes FROM `cantine` WHERE `semaine` = ? and `jour`=? and `horaire`=?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$semaine,$jour,$horaire]);
        return $sth->fetch();   
    }

    public function update($semaine,$jour,$horaire,$classes){
        global $dbh;

        $sql = "UPDATE `cantine` SET `classes`=? where semaine = ? and jour = ? and horaire = ? ";
        $sth = $dbh->prepare($sql);
        $sth->execute([$classes,$semaine,$jour,$horaire]); 
    }
}