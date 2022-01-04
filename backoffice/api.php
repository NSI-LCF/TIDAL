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
// }

$data['semaine'] = 'A';
$data['pass-cantine'] = 'TC-TD';
$data['profs-abs'] = ["M. Jany", "M. Dauch", "M. Druesnes"];

echo json_encode($data);
?>