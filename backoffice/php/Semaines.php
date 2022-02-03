<?php
class Semaines {
    public function get($type){ //affiche toutes les semaines
        global $dbh;

        $sql = "SELECT * FROM `semaines` where `type`=?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$type]);
        return $sth->fetchAll(); 
    }

    public function update($semaine,$type){
        global $dbh;

        $sql = "UPDATE `semaines` SET `type`=? where semaine = ? ";
        $sth = $dbh->prepare($sql);
        $sth->execute([$type,$semaine]);
    }

    public function getCurrentSemaine() {
        global $dbh;

        $date = new DateTime();
        $weekNumber = round($date->format("W"));
        $schoolWeeks = $this->getSchoolWeeks();
        // $currentWeek = 1

        // foreach ($schoolWeeks as $week) {

        // }
    }

    public function getStartAndEndDate($week, $year) {
        $dto = new DateTime();
        $dto->setISODate($year, $week);
        $ret['week_start'] = $dto->format('Y-m-d');
        $dto->modify('+6 days');
        $ret['week_end'] = $dto->format('Y-m-d');
        return $ret;
    }
    
    function getSchoolWeeks() {
        global $dbh;

        $sql = "SELECT * FROM `semaines` WHERE `type` = 0";
        $sth = $dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }
}