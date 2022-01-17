<?php
class Semaines {
    public function get($type){ //affiche toutes les semaines
        global $dbh;

        $sql = "SELECT * FROM `semaines` where `type`=?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$type]);
        return $sth->fetchAll(); 
    }

    public function getCurrentSemaine() {
        
    }

    public function update($semaine,$type){
        global $dbh;

        $sql = "UPDATE `semaines` SET `type`=? where semaine = ? ";
        $sth = $dbh->prepare($sql);
        $sth->execute([$type,$semaine]);
    }

    public function getStartAndEndDate($week, $year) {
        $dto = new DateTime();
        $dto->setISODate($year, $week);
        $ret['week_start'] = $dto->format('Y-m-d');
        $dto->modify('+6 days');
        $ret['week_end'] = $dto->format('Y-m-d');
        return $ret;
    }
}