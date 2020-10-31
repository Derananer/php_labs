<?php
$array = array(
  1,2,3,4
    );
print_r($array);
    
function minMaxAverage($array){
    $sum = 0;
    $num_max = 0;
    $num_min = 0;
    for($i = 0, $size = count($array); $i < $size; $i++) {
        $value = $array[$i];
        $sum += $value;
        if($array[$num_max] < $value )
            $num_max = $i;
        if($array[$num_min] > $value )
            $num_min = $i;
    }
    $sum /= count($array);
    echo "Number of max element=".$num_max."<br>";
    echo "Number of min element=".$num_min."<br>";
    echo "Average of elements=".$sum."<br>";
}

minMaxAverage($array);
