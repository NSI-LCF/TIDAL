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
    echo 'Semaine A';
} else {
    echo 'Semaine B';
}

function getStartAndEndDate($week, $year) {
    $dto = new DateTime();
    $dto->setISODate($year, $week);
    $ret['week_start'] = $dto->format('Y-m-d');
    $dto->modify('+6 days');
    $ret['week_end'] = $dto->format('Y-m-d');
    return $ret;
  }
  
  $week_array = getStartAndEndDate(52,2013);
  print_r($week_array);