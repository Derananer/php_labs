<?php

function gcd($a,$b) {
    return ($a % $b) ? gcd($b,$a % $b) : $b;
}

$A = 2;
$B = 4;
$C = 8;
$D = 5;

function drobSum($A,$B,$C,$D){
	$znamenatel=$B*$D;
	$chislitel=$A*$D+$C*$B;

	$nod=gcd($chislitel,$znamenatel);

	$znamenatel/=$nod;
	$chislitel/=$nod;

	echo "drob: ".$chislitel."/".$znamenatel;
}

drobSum($A,$B,$C,$D);
?>