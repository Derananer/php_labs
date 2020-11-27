<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>I am Iraaa</title>
</head>

<body>

<?php
$str = "5+63-10/2-0";
$pattern = "/[\+\-\*\/]/";
$matches = preg_match_all ($pattern,$str, $result);
$used_operations = array("+" => 0, "-" => 0, "*" => 0, "/" => 0); 
for ($i=0;$i<$matches;$i++)
	$used_operations[$result[0][$i]] += 1;

echo "input_str=".$str
?>
<table>
	<tbody>
		<?php foreach ($used_operations as $key => $value) {
			?>
			<tr>
				<td> <?php echo $key ?></td>
				<td> <?php echo $value ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>

</body>

</html>