<?php
class Absences {
    public function get($date = null) { //Affiche les prof absents ou tout l'historiel des prof absents
        global $dbh;

        if (isset($date)) {
            $sql = "SELECT * FROM `absences` WHERE `end_date` > ? ";
        } else {
            $sql = "SELECT * FROM `absences`";
        }
        
        $sth = $dbh->prepare($sql);
        $sth->execute([$date]);
        return $sth->fetchAll();
    }

    public function post($name, $begin_date, $end_date) {
        global $dbh;
        $sql = "INSERT INTO absences (`name`, begin_date, end_date) VALUES (?,?,?)";
        $sth = $dbh->prepare($sql);
        $sth->execute([$name,$begin_date,$end_date]);
    }

    public function delete($id) { // Enleve prof de la table absences
        global $dbh;

        $sql = "DELETE FROM `absences` WHERE id = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$id]);
    }
}