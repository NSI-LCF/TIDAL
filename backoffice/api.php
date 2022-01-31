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

$data["semaine"] = "A";
$data["pass-cantine"] = "TC-TD";
$data["profs-abs"] = ["M. Jany", "M. Dauch", "M. Druesnes"];
$data["annonce"]["titre"] = "Nouveau projet TIDAL";
$data["annonce"]["annonce"] = "Les chefducaralho doit se metter au travail";

echo json_encode($data);
