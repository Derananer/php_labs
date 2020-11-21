<?php
$str = "5+6*3-10/2";
$pattern = "/[\+\-\*\/]/";
$matches = preg_match_all ($pattern,$str, $result);
$used_operations = array("+" => 0, "-" => 0, "*" => 0, "/" => 0); 
for ($i=0;$i<$matches;$i++)
	$used_operations[$result[0][$i]] += 1;
print_r($used_operations);
?>