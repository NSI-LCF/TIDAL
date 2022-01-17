<?php
class Cantine {
    public function get(){
        global $dbh;

        $sql = "SELECT * FROM `cantine`";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();   
    }

    public function update($id, $classes){
        global $dbh;

        $sql = "UPDATE `cantine` SET `classes`=? WHERE id =  ? ";
        $sth = $dbh->prepare($sql);
        $sth->execute([$classes, $id]); 
    }
}