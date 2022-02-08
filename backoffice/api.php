<?php

// Example of a response from the API

// {
//     "semaine":"A",
//     "pass-cantine":"TC-TD",
//     "profs-abs":[
//         "M. Jany",
//         "M. Dauch",
//         "M. Druesnes"
//     ]
//     "annonce": {
//         "titre":"Nouveau projet TIDAL",
//         "annonce":"Les chefducaralho doit se metter au travail"
//     }
// }

include_once 'php/conf.php';
include_once 'php/Semaines.php';
include_once 'php/Cantine.php';
include_once 'php/Absences.php';
include_once 'php/Annonces.php';

$Semaines = new Semaines();
$Cantine = new Cantine();
$Absences = new Absences();
$Annonces = new Annonces();

$LastAnnonce = $Annonces->getLast();
$CurrentWeek = $Semaines->getCurrentSemaine();

$data["semaine"] = $CurrentWeek;
$data["pass-cantine"] = $Cantine->getCurrentClassesCantine($CurrentWeek);
$data["profs-abs"] = $Absences->getProfs();
$data["annonce"]["titre"] = $LastAnnonce["title"];
$data["annonce"]["annonce"] = $LastAnnonce["annonce"];

echo json_encode($data, JSON_UNESCAPED_UNICODE);
