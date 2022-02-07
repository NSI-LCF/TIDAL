<?php
class Cantine {
    public function get(){
        global $dbh;

        $sql = "SELECT * FROM `cantine`";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();   
    }

    public function processedGet() {
        $CantineData = $this->get();

        foreach ($CantineData as $key => $cantine) {
            // Jour
            $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
            $cantine["jour"] = $days[$cantine["jour"] - 1];

            // Heures
            $heures = ['12:30', '13:00', '13:30','14:00','14:30'];
            $cantine["begin_hour"] = $this->getHeureHoraire($cantine["horaire"] -1);
            $cantine["end_hour"] = $this->getHeureHoraire($cantine["horaire"]);

            $CantineData[$key] = $cantine;
        }

        return $CantineData;
    }

    public function getCurrentClassesCantine($weekType) {
        global $dbh;

        $date = new DateTime();
        $dayNumber = $date->format("N");
        $currentTime = date("H:i");

        $sql = "SELECT classes, horaire FROM `cantine` WHERE semaine = ? AND jour = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$weekType, $dayNumber]);
        $cantineData = $sth->fetchAll();
        $currentTime = 'Hors';

        // foreach ($cantineData as $horaire) {
        //     if (strtotime($this->getHeureHoraire($horaire["horaire"])) <= strtotime($currentTime)) {
        //         $currentTime = $this->getHeureHoraire($horaire["horaire"]);
        //     }
        // }

        // return $currentTime;
    }

    public function getHeureHoraire($horaire) {
        $heures = ['12:30', '13:00', '13:30','14:00','14:30'];
        return $heures[$horaire];
    }

    public function update($id, $classes){
        global $dbh;

        $sql = "UPDATE `cantine` SET `classes`= ? WHERE id = ? ";
        $sth = $dbh->prepare($sql);
        $sth->execute([$classes, $id]); 
    }
}