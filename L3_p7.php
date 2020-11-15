<?php
$str = file_get_contents("my_file2.txt");
$arr = explode(" ", $str);
$file = fopen("my_file3.txt","w");
for($i=0;$i<sizeof($arr);$i++)
{
  	$m = strrev($arr[$i]);
	fwrite($file,$m);
	fwrite($file," ");
}
fclose($file); 
$str1 = file_get_contents("my_file3.txt");
echo $str1;
?>
