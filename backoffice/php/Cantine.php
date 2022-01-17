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
            $heures = ['11h30', '12h30', '13h30', '14h30'];
            $cantine["begin_hour"] = $heures[$cantine["horaire"] - 1];
            $cantine["end_hour"] = $heures[$cantine["horaire"]];

            $CantineData[$key] = $cantine;
        }

        return $CantineData;
    }

    public function update($id, $classes){
        global $dbh;

        $sql = "UPDATE `cantine` SET `classes`=? WHERE id =  ? ";
        $sth = $dbh->prepare($sql);
        $sth->execute([$classes, $id]); 
    }
}