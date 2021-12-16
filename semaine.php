<?php
$ignoreWeek = [1, 9, 15, 16, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 44, 52]; // Il faut terminer l'année scolaire avec une semaine B pour eviter des bugs. :)
$currentWeek = date('W');
$lastLetter = True;
$weekList = [];

foreach (range(1, 53) as $semaine) {
    if (!in_array($semaine, $ignoreWeek)) {
        $lastLetter = !$lastLetter;
        $weekList[$semaine] = $lastLetter;
    };
}

if ($weekList[intval($currentWeek)] == True) {
    echo 'Semaine ª';
} else {
    echo 'Semaine B';
}
