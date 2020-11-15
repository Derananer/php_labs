<?php
$now = time();
$day=$_POST["day"];
$month=$_POST["month"];
$year=$_POST["year"];

$dr  = mktime(0, 0, 0, $month,   $day,   date("Y"));

$skolko=($dr - $now);
 
$dney = floor($skolko / 86400);
echo "Осталось дней до дня рождения - $dney<br>\n";

?>