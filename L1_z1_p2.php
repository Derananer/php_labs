<table >
	<tbody>
		<?php 
		$p = 3;
		for ($i=1; $i<10; $i++) { 
					?>
				      	<tr>
							<td><?php
							$result = $p * $i;
							echo "$p x $i=$result"; 
							?></td>
				      	</tr>
			 	<?php } ?>
	</tbody>
</table>
