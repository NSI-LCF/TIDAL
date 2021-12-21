<?php 
function getStartAndEndDate($week, $year) {
    $dto = new DateTime();
    $dto->setISODate($year, $week);
    $ret['week_start'] = $dto->format('Y-m-d');
    $dto->modify('+6 days');
    $ret['week_end'] = $dto->format('Y-m-d');
    return $ret;
  }
  //$week_array = getStartAndEndDate(date('W'),date('Y'));
  //print_r($week_array['week_start']);
?>