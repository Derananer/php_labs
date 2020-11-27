<?php
$file = fopen("my_file.txt","r+");
$content = fread($file,filesize("my_file.txt")); 
fclose($file); 
$content_new=intval($content);
$content_new++;
$file = fopen("my_file.txt","w");
fwrite ($file,$content_new);
fclose($file); 
echo $content_new;
?>