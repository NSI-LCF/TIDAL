<?php
class UserManagement {
    public function get() {
        global $dbh;
        
        $sql = "SELECT * FROM `users`";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();   
    }


    public function post($username, $password, $type) {
        global $dbh;

        $sql = "INSERT INTO users (username, `password`, `type`) VALUES (?,?,?)";
        $sth = $dbh->prepare($sql);
        $sth->execute([$username, hash("sha256", $password), $type]);
    }

    public function delete($id) { // Enleve prof de la table absences
        global $dbh;

        $sql = "DELETE FROM `users` WHERE id=?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$id]);
    }
}