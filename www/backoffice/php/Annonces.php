<?php
class Annonces {
    public function get() {
        global $dbh;

        $sql = "SELECT * FROM `annonces` ORDER BY creation_time DESC LIMIT 10";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();   
    }

    public function getLast() {
        global $dbh;

        $sql = "SELECT * FROM `annonces` ORDER BY creation_time DESC LIMIT 1";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }
    public function getLast3() {
        global $dbh;

        $sql = "SELECT * FROM `annonces` ORDER BY creation_time DESC LIMIT 3";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function post($title, $annonce) {
        global $dbh;
        
        $sql = "INSERT INTO annonces (title, annonce) VALUES (?,?)";
        $sth = $dbh->prepare($sql);
        $sth->execute([$title,$annonce]);
    }

    public function delete($id) { 
        global $dbh;

        $sql = "DELETE FROM `annonces` WHERE id = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$id]);
    }
}